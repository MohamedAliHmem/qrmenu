<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Auth;
use Illuminate\Http\Request;
use ZipArchive;
use Imagick;
use ImagickPixel;
use ImagickDraw;

class QrCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function generateQrCodes(Request $request)
{
    // Validate and extract table numbers from the request
    $tableNumbers = explode('.', $request->table_numbers);
    foreach ($tableNumbers as $number) {
        if (!ctype_digit($number)) {
            return back()->with(['alert' => 'Table numbers must be in the format: 1.2.3']);
        }
    }

    // Create a new ZIP archive
    $zip = new ZipArchive;
    $zipFileName = 'Paloma_Tech_Solutions_qr_codes.zip';
    $zipFilePath = public_path($zipFileName);

    if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
        // Generate QR codes and add each QR code image to the ZIP archive
        foreach ($tableNumbers as $index => $number) {
            // Generate QR code link
            $link = 'https://www.paloma-tech-solutions.tn/shop/' . $number . '/' . Auth::user()->idCafe;

            // Generate QR code in PNG format
            $qrCode = QrCode::format('png')->size(300)->generate($link);

            // Create an Imagick object from the QR code
            $image = new Imagick();
            $image->readImageBlob($qrCode);

            // Create a canvas to hold the QR code and text
            $canvasHeight = $image->getImageHeight() + 250; // Adding space for text
            $canvasWidth = $image->getImageWidth() + 180;
            $canvas = new Imagick();
            $canvas->newImage($canvasWidth, $canvasHeight, new ImagickPixel('white'));

            // Add table number text at the top
            $draw = new ImagickDraw();
            $draw->setFontSize(60);
            $draw->setFillColor(new ImagickPixel('black'));
            $draw->setTextAlignment(\Imagick::ALIGN_CENTER);

            // Set the font
            $fontPath = public_path('fonts/Lobster-Regular.ttf');
            $draw->setFont($fontPath);

            $draw->annotation($canvasWidth / 2, 50, 'Table Numéro ' . $number); // Adjust text position

            // Draw the table number text on the canvas
            $canvas->drawImage($draw);

            // Calculate the horizontal offset to center the image
            $xOffset = ($canvasWidth - $image->getImageWidth()) / 2;

            // Place QR code at the calculated position
            $canvas->compositeImage($image, Imagick::COMPOSITE_OVER, $xOffset, 70);

            // Add text below the QR code
            $draw->setFontSize(60);
            $draw->annotation($canvasWidth / 2, $image->getImageHeight() + 140, 'SCANNER POUR'); // First line
            $draw->annotation($canvasWidth / 2, $image->getImageHeight() + 200, 'COMMANDER'); // Second line

            // Draw the bottom text on the canvas
            $canvas->drawImage($draw);

            // Flatten the image and set the format
            $canvas->flattenImages();
            $canvas->setImageFormat('png');

            // Add the final image to the ZIP archive
            $zip->addFromString("Table_numéro_" . $number . "_qr_code_" . ($index + 1) . ".png", $canvas->getImagesBlob());
        }
        $zip->close();

        // Set headers to force download the zip file
        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    } else {
        return back()->withErrors(['error' => 'Failed to generate ZIP file']);
    }
}

}










/*public function generateQrCodes(Request $request)
    {
        // Extract and filter table numbers from the request
        $tableNumbers = array_filter(explode('.', $request->table_numbers));

        // Create a new ZIP archive
        $zip = new ZipArchive;
        $zipFileName = 'Paloma_Tech_Solutions_qr_codes.zip';
        $zipFilePath = public_path($zipFileName);

        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            // Guzzle HTTP client to interact with QR code API
            $client = new Client();

            foreach ($tableNumbers as $index => $number) {
                // Generate QR code link
                $link = 'http://abc.test/' . $number . '/' . auth()->user()->idCafe;

                // Request QR code image from external service
                $jsonBody = [
                    'size' => 300,
                    'data' => $link,
                    'format' => 'png',
                    'config' => [
                        'body' => 'circle',
                        'logo' => '#facebook'
                    ]
                ];

                // Send POST request with JSON body
                $response = $client->post('https://api.qrcode-monkey.com/qr/custom', [
                    'json' => $jsonBody
                ]);

                // Save QR code image to ZIP archive
                $zip->addFromString("table_numero_" . $number . "qr_code_" . ($index + 1) . ".png", $response->getBody());
            }
            $zip->close();

            // Set headers to force download the zip file
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } else {
            return back()->withErrors(['error' => 'Failed to generate ZIP file']);
        }
    }*/



    /*public function generateQrCodes(Request $req){

        $table_numbers = array_filter(explode('.', $req->table_numbers));
        $barcodes = [];
        foreach($table_numbers as $number){
            $link = 'http://abc.test/' . $number . '/' . Auth::user()->idCafe;
            $barcode = QrCode::size(300)->generate($link);
            $barcodes[] = $barcode;
        }
        return view('qr_code/qr_code_output', ['barcodes' => $barcodes]);
    }

    public function downloadQrCodes(Request $request)
    {
        // Example data for $barcodes, replace with your actual data retrieval logic
        $barcodes = [
            // Replace with actual base64 encoded image strings
            'data:image/png;base64,base64data1',
            'data:image/png;base64,base64data2',
            // Add more as needed
        ];

        // Create a new ZIP archive
        $zip = new ZipArchive;
        $zipFileName = 'qr_codes.zip';
        $zipFilePath = public_path($zipFileName);

        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            // Add each QR code image to the ZIP archive
            foreach ($barcodes as $index => $barcode) {
                // Ensure $barcode starts with 'data:image/png;base64,'
                $base64Data = substr($barcode, strpos($barcode, ',') + 1);
                $imageData = base64_decode($base64Data);
                $zip->addFromString("qr_code_" . ($index + 1) . ".png", $imageData);
            }
            $zip->close();

            // Set headers to force download the zip file
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } else {
            return back()->withErrors(['error' => 'Failed to generate ZIP file']);
        }
    }*/
