<?php

use FilippoToso\PdfWatermarker\Support\Pdf;
use FilippoToso\PdfWatermarker\Watermarks\ImageWatermark;
use FilippoToso\PdfWatermarker\PdfWatermarker;
use FilippoToso\PdfWatermarker\Support\Position;
use FilippoToso\PdfWatermarker\Facades\TextWatermarker;
//$fileName --> name of file which will be saved
//$ext --> extention of file which will be saved
//$path --> where location file will be saved
// $file --> $request->file from controller
function UploadFile($fileName, $ext, $path, $file)
{
    $fileName = $fileName . '.' . $ext;
    $file->move(public_path($path), $fileName);

    $files = public_path($path) . "\\" . $fileName;
    WatermarkPdf($files);
}

function WatermarkPdf($path)
{
    // $pdf = new Pdf($path);

    // $image = public_path('watermark.png');
    // $watermark = new ImageWatermark($image);


    // // Create a new watermarker
    // $watermarker = new PDFWatermarker($pdf, $watermark);
    // $watermarker->setPosition(new Position(Position::TOP_LEFT, 1,1));
    // $watermarker->save($path);

    // TextWatermarker::input($path)
    // ->output($path)
    // ->position(Position::MIDDLE_CENTER, 0, -10)
    // ->text('STRICTLY CONFIDENTIAL')
    // ->angle(45)
    // ->font(public_path('font.ttf'))
    // ->size('200')
    // ->color('#CC00007F') // 7F is the alpha channel (transparency or opacity of color) 0 - 255 in hex
    // ->resolution(300) // 300 dpi
    // ->save();
}
