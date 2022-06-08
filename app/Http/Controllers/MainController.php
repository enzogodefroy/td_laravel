<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Command;
use App\Models\Commanddetail;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\Facades\DB;
 
class MainController extends Controller
{
    /**
     * Show product
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function product($id)
    {
        return view('product', [
            'product' => Product::findOrFail($id)
        ]);
    }

    /**
     * Show command
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function command($id)
    {
        return view('command', [
            'command' => Command::findOrFail($id)
        ]);
    }

    public function validateCommandDetail()
    {
        $product = $_GET['product'];
        $command = $_GET['command'];

        Commanddetail::where([['idCommand', $command], ['idProduct', $product]])->update(['prepared' => 1]);
        return redirect()->back();
    }
}