<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Command;
use App\Models\Commanddetail;
use App\Models\Basket;
use App\Models\Basketdetail;
use App\Models\Timeslot;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;
 
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

    public function getUserBaskets($userId)
    {
        $baskets = Basket::where('idUser', $userId)->get();

        return view('baskets', [
            'baskets' => $baskets
        ]);
    }

    public function getBasketDetails($basketId)
    {
        return view('basketDetails', [
            'basket' => Basket::findOrFail($basketId)
        ]);
    }

    public function chooseTimeslot($basketId)
    {
        return view('chooseTimeslot', [
            'timeslots' => Timeslot::all(),
            'idBasket' => $basketId
        ]);
    }

    public function basketValid()
    {
        $basketId = $_GET['idBasket'];
        $timeslotId = $_GET['idTimeslot'];

        $basket = Basket::findOrFail($basketId);
        $timeslot = Timeslot::findOrFail($timeslotId);

        $command = new Command();
        $command->fill([
            'idUser' => $basket->user->id,
            'dateCreation' => new DateTime('now'),
            'status' => 'preparation',
            'amount' => 0,
            'toPay' => 0,
            'itemsNumber' => 0,
            'missingNumber' => 0,
            'timeslot' => $timeslot
            ]
        );

        $command->save();

        for ($i = 0; $i < count($basket->basketdetails); $i++)
        {
            $product = $basket->basketdetails [$i]->product;
            $quantity = $basket->basketdetails [$i]->quantity;

            $productId = $product->id;

            $detail = new Commanddetail();
            $detail->fill([
                'quantity' => $quantity,
                'prepared' => false,
                'idProduct' => $product->id,
                'idCommand' => $command->id
            ]);

            $detail->save();
            DB::table('basketdetail')->where(['idProduct' => $productId, 'idBasket' => $basketId])->delete();
        }

        $userId = $basket->user->id;
        $basket->delete();
        return redirect()->route('baskets', ['userId' => $userId]);
    }
}