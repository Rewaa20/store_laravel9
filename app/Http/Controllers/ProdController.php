<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Fav;
use App\Models\Categ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
use Carbon\Carbon;


class ProdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('create' , 'showCart' , 'fav');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prods = Product::latest()->get();
        return view('index', compact('prods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $res = DB::select('select * from products where uId = ?', [Auth::id()]);//h
        $res = Product::all();
        return view('cpanel' , compact('res'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make( $request->all() , [
            'name'=>'required',
             'email'=>'required | email',
             'password'=>'required'
           ] );
        if($valid->fails()){
             return redirect()->back()->withErrors($valid)->withInput();
        }else{
        $data=new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password) ;
        $data->save();
        return redirect('login');
    }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = product::find($id);
        $ps = DB::select('select ProdShow from products where id = ?', [$id]);
        DB::update('update products set ProdShow = ? where id = ?', [$ps[0]->ProdShow + 1 , $id ]);
        return view('details' , compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Product::find($id);
        return view('edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit = Validator::make( $request->all() , [

            'name'=>'required',
            'price'=>'required',
            'cat'=>'required',
            'des'=>'required'


           ] );

           if($edit->fails()){
             return redirect()->back()->withErrors($edit)->withInput();
        }else{
            $data = product::find($id);

            if($request->file('image')){
                $path = public_path('/uploaded') .'/'. $data->ProdImg ;
                unlink($path);
                $up_img = $request->file('image');
                $imgName = $up_img->getClientOriginalName();
                $imgName = time().'_'.$imgName;
                $up_img->move(public_path('/uploaded'),$imgName);
         }else{
                $imgName = $data->ProdImg;
              }
            $data->ProdName	 = $request->name;
            $data->ProdPrice = $request->price;
            $data->ProdCat =  $request->cat ;
            $data->ProdImg =  $imgName;
            $data->ProdDes =  $request->des;
            $data->save();
            return redirect('product/create');


        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //nothing
    }

    public function valid_login(Request $request)
    {
        $request->validate([
            'email'=>'required | email',
            'password'=>'required',
        ]);

        $data = $request->only(['email','password']);
        if(Auth::attempt($data)){
           return redirect('product');
        }

            return redirect('login')->with('fail' , 'no match data');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
    public function validAdd(Request $request)
    {
        $add = Validator::make( $request->all() , [
            'name'=>'required',
            'price'=>'required',
            'cat'=>'required',
            'image'=>'required',
            'des'=>'required'
           ] );
        if($add->fails()){
             return redirect()->back()->withErrors($add);
        }else{
            $up_img = $request->file('image');
            $imgName = $up_img->getClientOriginalName();
            $imgName = time().'_'.$imgName;
            $up_img->move(public_path('/uploaded') , $imgName);
            $data=new Product;
            $data->ProdName	 = $request->name;
            $data->ProdPrice = $request->price;
            $data->ProdCat =  $request->cat ;
            $data->ProdImg =  $imgName;
            $data->ProdDes =  $request->des;
            $mytime = Carbon::now();
            $data->ProdDate =  $mytime->toDateTimeString();
            $data->ProdShow =  0;
            $data->ProdBuy = 0;
            $data->uId = Auth::id();
            $cat = DB::select('select id from categs where category = ?', [$request->cat]);
            $data->catId = $cat[0]->id;
            $data->tab = 0;
            $data->save();
            return redirect('product/create');

    }
    }

    public function shop()
    {
        $prods=Product::all();
        // $prods = DB::select('select * from products where uId = ?', [Auth::id()]);//h
        return view('shop', compact('prods'));
    }

    public function cart($id)
    {

        $pb = DB::select('select ProdBuy from products where id = ?', [$id]);
        DB::update('update products set ProdBuy = ? where id = ?', [$pb[0]->ProdBuy + 1 , $id ]);

        $U_id = Auth::id();
        $P_id = Product::find($id)->id;
        $cart = new Cart;
        $cart->U_id = $U_id;
        $cart->P_id = $P_id;
        $cart->Status = 0;
        $cart->save();
        return redirect('showCart');
    }
    public function showCart()
    {
        $res_prod = Product::all();
        $res = DB::select('select * from carts where U_id = ? && Status = 0', [Auth::id()]);//h
        // return $res;
        return view('cart',compact('res_prod', 'res'));
    }

    public function delProd($id)
    {
        $row = Product::find($id);
        $row->delete();
         $path = public_path('/uploaded') .'/'. $row->ProdImg ;
        if(File::exists($path)){
            File::delete($path);
        }
        return redirect()->back();
    }

    public function delCart($id)
    {
        $row = Cart::find($id);
        $row->delete();
        return redirect()->back();
    }

    public function done()
    {
        DB::update('update carts set Status = 1 where U_id = ? && Status = 0', [Auth::id()]);
        return redirect()->back();
    }

    public function addFav($id)
    {
         $U_id = Auth::id();
         $P_id = Product::find($id)->id;
         $rep = DB::select('select * from favs where uId = ? && pId = ?',[$U_id ,$P_id]);//h
         if($rep){
            return redirect()->back();
         }else{
            $fav = new Fav;
            $fav->uId = $U_id;
            $fav->pId = $P_id;
            $fav->save();
            return redirect()->back();
         }


    }

    public function fav()
    {
        $res_prod = Product::all();
        $res = DB::select('select * from favs where uId = ? ', [Auth::id()]);//h
        return view('favriout' , compact('res' , 'res_prod'));
    }
    public function favDel($id)
    {
        $idf = DB::select('select id from favs where pId = ? && uId = ?', [$id , Auth::id()]);//h
            $idp = $idf[0]->id;
            $row = Fav::find($idp);
            $row->delete();
            return redirect()->back();
    }

    public function jewlary()
    {

        return redirect()->back()->with('categ','اكسسوريز');

    }
    public function bag()
    {

        return redirect()->back()->with('categ','شنط');

    }
    public function parfan()
    {

        return redirect()->back()->with(['categ'=>'عطور']);
    }
    public function women()
    {

        return redirect()->back()->with('categ','ملابس نساء');

    }
    public function men()
    {

        return redirect()->back()->with('categ','رجال');

    }
    public function makeup()
    {

        return redirect()->back()->with('categ','مكياج');

    }
    public function care()
    {

        return redirect()->back()->with('categ','عنايه');

    }
    public function devs()
    {

        return redirect()->back()->with('categ','اجهزه');

    }
}
