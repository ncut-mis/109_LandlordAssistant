<?php


namespace App\Http\Controllers;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use App\Models\Contract;
use App\Models\House;
use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Feature;
use Illuminate\Support\Facades\Validator;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(House $house)
    {
        $data = [
            'house' => $house,];
        return view('owners.houses.contracts.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContractRequest $request, House $house)
    {
        $data = [
            'house' => $house,];

        // 定義驗證規則
        $rules = [
            'pdf_file' => 'required|mimes:pdf|max:20480',
        ];

        // 定義驗證訊息
        $messages = [
            'pdf_file.required' => '請選擇檔案',
            'pdf_file.mimes' => '請上傳 PDF 檔案',
            'pdf_file.max' => '檔案大小不能超過 20MB',
        ];
        // 驗證檔案類型和大小
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // 如果驗證失敗，回傳錯誤訊息
            return redirect()->back()->with('message', $validator->errors()->first());
        }




    // 取得上傳的 PDF 文件
    $pdf = $request->file('pdf_file');

    // 產生亂數檔名
    $filename = Str::random(20) . '.' . $pdf->getClientOriginalExtension();

    // 將 PDF 文件保存到公開資料夾中
//
    $file_path = public_path('contracts/'.$filename);
    move_uploaded_file($pdf->getPathname(), $file_path);

    $contract = new Contract;
    $contract->house_id=$house->id;
    $contract->renter_id=1;
    $contract->path = $filename;
    $contract->save();








//        return back()->with('success', '新增合約成功！');
        return redirect()->route('owners.houses.show',$data)->with('success', '上傳成功！');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContractRequest $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        //
    }
}
