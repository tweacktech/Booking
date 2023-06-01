<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Auth;
use DB;

class CompanyController extends Controller
{

       public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $company = Company::all();

        return view('company.profile', compact('company'));
    }

        public function company()
    {
        $company = Company::all();

        return view('company.index', compact('company'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function addCompany(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            // 'airline_id' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time().'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('/logos'), $logoName);
            $validatedData['logo'] = $logoName;
        }

        Company::create($validatedData);

        return redirect()->route('company')->with('success', 'Company created successfully.');
    }

    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }

    public function editCompany($id)
    {
        $company=company::findOrFail($id);
        return view('company.show', compact('company'));
    }





public function unhideCompany(Request $req, $id)
  {
    $update = DB::table('companies')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Company was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back()->with('success', 'Company unhide successfully.');
    }
  return redirect()->back()->with('error', 'Could not perform this action');
  }

  public function hideCompany(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('companies')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Company was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
    return redirect()->back()->with('success', 'Company hidden successfully.');
    }
   return redirect()->back()->with('error', 'Could not perform this action');
  }


    public function updateCompany(Request $request,$id)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time().'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('/logos'), $logoName);
            $validatedData['logo'] = $logoName;
        }
        $company = Company::findOrFail($id);
        $company->update($validatedData);

        return redirect()->back()->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('company.index')->with('success', 'Company deleted successfully.');
    }
}
