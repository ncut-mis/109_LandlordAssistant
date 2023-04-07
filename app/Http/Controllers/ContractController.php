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
        // 檢查是否有上傳檔案

        if (!$request->hasFile('pdf_file')) {
            return response()->json(['error' => 'No file uploaded'], 400);
        }

        // 檢查上傳的檔案是否有效
        if (!$request->file('pdf_file')->isValid()) {
            return response()->json(['error' => 'Invalid file'], 400);
        }

        // 取得上傳的 PDF 文件
        $pdf = $request->file('pdf_file');

        // 產生亂數檔名
        $filename = Str::random(20) . '.' . $pdf->getClientOriginalExtension();

        // 將 PDF 文件保存到公開資料夾中
//
        $file_path = public_path('contracts/'.$filename);
      move_uploaded_file($pdf->getPathname(), $file_path);
//        $path = $pdf->storeAs('public/contracts', $filename);
//        Storage::disk('public')->putFileAs('contracts', $pdf, $filename);
        // 取得公開資料夾中的檔案 URL
//        $url = Storage::disk('public')->url($filename);


//        $file = $request->file('pdf_file');
//
//        // 驗證上傳文件是否成功
//        if (!$file || !$file->isValid()) {
//            return response()->json(['message' => '上傳文件失敗'], 400);
//        }
//
//        // 為PDF文件生成一個隨機的10位字符串作為文件名稱
//        $fileName = Str::random(10) . '.pdf' ;
//        // 上傳PDF文件到public/contracts目錄下
//        $path = $file->storeAs('public/contracts', $fileName);

       // 將PDF文件路徑存儲在Contracts資料表中

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
