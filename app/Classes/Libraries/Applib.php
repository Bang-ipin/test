<?php

namespace App\Libraries;

use App\Blog;
use App\Category;
use App\City;
use App\Comment;
use App\Contact;
use App\Statistik;
use App\Job;
use App\JobCategory;
use App\Menu;
use App\Menuitems;
use App\Modul;
use App\Order;
use App\Page;
use App\Pendidikan;
use App\Product;
use App\ProductAtribut;
use App\ProductCategory;
use App\ProductReview;
use App\Province;
use App\Slider;
use App\Supplier;
use App\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Applib {

    // public static function select($name = "menu", $menulist = array())
    // {
    //     $html = '<select name="' . $name . '">';

    //     foreach ($menulist as $key => $val) {
    //         $active = '';
    //         if (request()->input('menu') == $key) {
    //             $active = 'selected="selected"';
    //         }
    //         $html .= '<option ' . $active . ' value="' . $key . '">' . $val . '</option>';
    //     }
    //     $html .= '</select>';
    //     return $html;
    // }

    // public static function getByName($name)
    // {
    //     $menu = Menu::byName($name);
    //     return is_null($menu) ? [] : self::get($menu->id);
    // }

    // public static function get($menu_id)
    // {
    //     $menuItem = new Menuitems();
    //     $menu_list = $menuItem->getall($menu_id);

    //     $roots = $menu_list->where('menu', (integer) $menu_id)->where('parent', 0);

    //     $items = self::tree($roots, $menu_list);
    //     return $items;
    // }

    // private static function tree($items, $all_items)
    // {
    //     $data_arr = array();
    //     $i = 0;
    //     foreach ($items as $item) {
    //         $data_arr[$i] = $item->toArray();
    //         $find = $all_items->where('parent', $item->id);

    //         $data_arr[$i]['child'] = array();

    //         if ($find->count()) {
    //             $data_arr[$i]['child'] = self::tree($find, $all_items);
    //         }

    //         $i++;
    //     }

    //     return $data_arr;
    // }

    // public static function menupage(){
    //     $querypages     = Page::orderBy('id','ASC')->get();
    //     foreach ($querypages as $pages){
    //     echo "<tbody>
    //             <td>
    //                 $pages->nama_laman
    //             </td>
    //             <td align='center'>
    //                 <a  href='#' data-url='$pages->pages_seo' data-title='$pages->nama_laman'class='button-secondary tambahkan-ke-menu right'  >Add <i class='fa fa-sign-out'></i> </a>
    //                 <span class='spinner' id='spinkategori'></span>
    //              </td>
    //         </tbody>";
    //     }
    // }
    // public static function menukategori(){
    //     $query     = Category::where('_parent','=','1')->get();
    //     foreach ($query as $pages){
    //     echo "<tbody>
    //             <td>
    //                 $pages->kategori
    //             </td>
    //             <td align='center'>
    //                 <a href='#' data-url='blog/$pages->_slug' data-title='$pages->kategori' class='button-secondary tambahkan-ke-menu right'  >Add <i class='fa fa-sign-out'></i> </a>
    //                 <span class='spinner' id='spinkategori'></span>
    //              </td>
    //         </tbody>";
    //     }
    // }
    // public static function menumodul(){
    //     $query     = Modul::all();
    //     foreach ($query as $modul){
    //     echo "<tbody>
    //             <td>
    //                 $modul->nama
    //             </td>
    //             <td align='center'>
    //                 <a href='#' data-url='$modul->url_modul' data-title='$modul->nama' class='button-secondary tambahkan-ke-menu right'  >Add <i class='fa fa-sign-out'></i> </a>
    //                 <span class='spinner' id='spinkategori'></span>
    //              </td>
    //         </tbody>";
    //     }
    // }
    // public static function menuproduk(){
    //     $query     = Produk::all();
    //     foreach ($query as $produk){
    //         $slug= Str::slug($produk->judul,'-');
    //     echo "<tbody>
    //             <td>
    //                 $produk->judul
    //             </td>
    //             <td align='center'>
    //                 <a href='#' data-url='$slug' data-title='$produk->judul' class='button-secondary tambahkan-ke-menu right'  >Add <i class='fa fa-sign-out'></i> </a>
    //                 <span class='spinner' id='spinkategori'></span>
    //              </td>
    //         </tbody>";
    //     }
    // }

    //SLIDER
//     public static function get_slider_top(){
//         $query= Slider::where('status',2)->where('tipe',1)->orderBy('posisi')->take(5)->get();
//         return $query;
// 	}
	
// 	public static function get_countsliderTop(){
// 		$query= Slider::where('status',3)->where('tipe',1)->orderBy('posisi')->get()->count();
// 	}
	
//     public static function WebMenu($id)
//     {
//         $menu            = Menu::where('id',$id)->with('items')->first();
//         $public_menu     = $menu->items;
//         return $public_menu;
        
//     }
    
//    public static function listInbox(){
//         $query                      = Contact::where('status','=','0')->orderBy('created_at','DESC')->get();
//         return $query;
//     }
//     public static function totalInbox(){
//         $totalinbox                 = Contact::where('status','=','0')->get()->count();
//         $semua                      = isset($totalinbox) ? $totalinbox : 0;
//         return $semua;
//     }
    
//     public static function totalKomentar(){
//         $totalkomentar              = Comment::where('dibaca','=','0')->get()->count();
//         $semua                      = isset($totalkomentar) ? $totalkomentar : 0;
//         return $semua;
//     }
   
//     public static function getJudulBlog($id){
//         $query                      = Blog::where('id','=',$id)->get();
// 		if($query->count() > 0){
// 			foreach($query as $h){
// 				$hasil = $h->judul;
// 			}
// 		}else{
// 			$hasil = '';
// 		}
// 		return $hasil;
//     }
//     public static function statistika($bln,$tahun){
//         $query = Statistik::select(DB::raw('month(created_at) as bln , year(created_at) as th, sum(hits) as jumlah'))
//                     ->whereMonth('created_at','=',$bln)
//                     ->whereYear('created_at','=',$tahun)
//                     ->groupByRaw('month(created_at),year(created_at)')
//                     ->get();

//         if($query->count() > 0){
//             foreach($query as $row){
//                 $hasil=$row->jumlah;
//             }
//         }
//         else{
//             $hasil=0;
//         }
//         return $hasil;
//     }

//     public static function CariNamaKota($id){
// 		$t = City::where('id_kabkota',$id)->get();
// 		if($t->count() > 0){
// 			foreach($t as $h){
// 				$hasil              = $h->nama_kabkota;
// 			}
// 		}else{
// 			$hasil                  = '';
// 		}
// 		return $hasil;
//     }
// 	public static function CariNamaProvinsi($id){
// 		$t = Province::where('id_propinsi',$id)->get();
// 		if($t->count() > 0){
// 			foreach($t as $h){
// 				$hasil              = $h->nama_propinsi;
// 			}
// 		}else{
// 			$hasil                  = '';
// 		}
// 		return $hasil;
//     }
// 	public static function CariNamaPendidikan($id){
// 		$t = Pendidikan::where('id',$id)->get();
// 		if($t->count() > 0){
// 			foreach($t as $h){
// 				$hasil              = $h->pendidikan;
// 			}
// 		}else{
// 			$hasil                  = '';
// 		}
// 		return $hasil;
//     }
//     public static function CariNamaKategori($id){
// 		$t = JobCategory::where('id',$id)->get();
// 		if($t->count() > 0){
// 			foreach($t as $h){
// 				$hasil              = $h->kategori;
// 			}
// 		}else{
// 			$hasil                  = '';
// 		}
// 		return $hasil;
//     }
//     public static function CariKodeKategori($slug){
// 		$t = JobCategory::where('slug',$slug)->get();
// 		if($t->count() > 0){
// 			foreach($t as $h){
// 				$hasil              = $h->id;
// 			}
// 		}else{
// 			$hasil                  = '';
// 		}
// 		return $hasil;
//     }
//     public static function selisih($id){
//         date_default_timezone_set('Asia/Jakarta');
//        $t = Job::select(DB::raw('DATEDIFF(DATE_ADD(batas_waktu, INTERVAL 0 DAY), CURDATE()) as selisih'))->where('id',$id)->get();
//        if($t->count() >0){
//            foreach($t as $h){
//                $hasil = $h->selisih;
//            }
//        }else{
//            $hasil = 0;
//        }
//        return $hasil;
//    }
//    public static function expired($id,$selisih) {
//         $query          = " UPDATE jobs";
//         $query_parent   = " SET expired = 0";
//         $query_ids      = " WHERE DATEDIFF(CURDATE(),batas_waktu) > $selisih AND id =$id";
//         DB::update($query.$query_parent.$query_ids);
//    }
//    // Job::update('dibaca',$baca +1)->where('id',$detail['id']);
//    public static function updatehits($id,$baca) {
//         $query          = " UPDATE jobs";
//         $query_parent   = " SET hits = $baca + 1";
//         $query_ids      = " WHERE id =$id";
//         DB::update($query.$query_parent.$query_ids);
//    }
//    public static function updatehitsblog($id,$baca) {
//         $query          = " UPDATE blogs";
//         $query_parent   = " SET hits = $baca + 1";
//         $query_ids      = " WHERE id =$id";
//         DB::update($query.$query_parent.$query_ids);
//    }

   /////////// DORPDOWN STATUS /////////////////
   public static function dd_status(){
		$dd['0']        = 'Inactive';
        $dd['1']        = 'Active';
		return $dd;
   }
   /////////// DORPDOWN Favorit /////////////////
   public static function dd_favorit_produk(){
        $dd['0']        = 'No';
        $dd['1']        = 'Yes';
		return $dd;
   }
    /////////// DORPDOWN LABEL PRODUK /////////////////
    public static function dd_label_produk(){
        $dd['']='---Label---';
        $dd['0']= 'None';
        $dd['1']= 'New';
        $dd['2']= 'Best Seller';
	    return $dd;
	}
     /////////// DORPDOWN LABEL PRODUK /////////////////
//     public static function dd_supplier(){
       
//         $query      = Supplier::orderBy('id','ASC')->get();
//         $dd['']     ='---Pilih---';
//         if($query->count() > 0){
//             foreach($query as $row){
//                 $dd[$row->id]= $row->nama;
//             }
//         }
//             return $dd;
//     }

//     public static function dd_kategori_produk(){
// 	$query              = ProductCategory::orderBy('kategori_produk','ASC')->get();
// 	$dd[]               = '';
//         if($query->count() > 0){
//             foreach($query as $row){
//                 $dd[$row->id]= $row->kategori_produk;
//             }
//         }
// 		return $dd;
// 	}
//     public static function getTambahStok($id,$tambah)
//     {
//         $q = Product::select('qty')->where('id',$id)->get();
//         $stock = "";
//         foreach($q as $d)
//         {
//             $stock = $d->qty + $tambah;
//         }
//         return $stock;
//     }
//     public static function CariNamaKategoriProduk($id){
// 		$t = ProductCategory::where('id',$id)->get();
// 		if($t->count() > 0){
// 			foreach($t as $h){
// 				$hasil              = $h->kategori_produk;
// 			}
// 		}else{
// 			$hasil                  = '';
// 		}
// 		return $hasil;
//     }
//    /////////// DORPDOWN TAG /////////////////
//    public static function dd_tag(){
//         $query                      = Tag::orderBy('id','ASC')->get();
//         $dd                         =array();
//         if ($query->count() > 0){
//             foreach($query as $row){
//                 $dd[$row->id] = $row->tag;
//             }
//         }
//         return $dd;
//     }

//     /////////// DORPDOWN KATEGORI /////////////////
//     public static function dd_kategori(){
// 		$query                      = Category::where('_parent','=','1')->orderBy('id','ASC')->get();
//         $dd['']                     = '---Pilih---';
//         if ($query->count() > 0){
//             foreach($query as $row){
//                 $dd[$row->_slug] = $row->kategori;
//             }
//         }
// 		return $dd;
//     }

//     /////////// DORPDOWN PARENT KATEGORI /////////////////
//     public static function dd_parent(){
// 		$dd['1']= 'Blog';
// 		return $dd;
// 	}

//     /////////// DORPDOWN KATEGORI PEKERJAAN /////////////////
//     public static function dd_kategori_pekerjaan(){
// 		$query                      = JobCategory::where('status','=','1')->orderBy('id','ASC')->get();
//         $dd                          = array();
//         if ($query->count() > 0){
//             foreach($query as $row){
//                 $dd[$row->id] = $row->kategori;
//             }
//         }
// 		return $dd;
//     }

//     /////////// DORPDOWN KATEGORI PENDIDIKAN /////////////////
//     public static function dd_level_pendidikan(){
// 		$query                      = Pendidikan::orderBy('id','ASC')->get();
//         $dd                         = array();
//         if ($query->count() > 0){
//             foreach($query as $row){
//                 $dd[$row->id] = $row->pendidikan;
//             }
//         }
// 		return $dd;
//     }

    /////////// DORPDOWN LABEL /////////////////
    public static function dd_label(){
        $dd['0']= 'Freelance';
        $dd['1']= 'Full Time';
        $dd['2']= 'Part Time';
        return $dd;
    }

    // /////////// DORPDOWN PROVINSI /////////////////
    // public static function dd_provinsi(){
    //     $query                      = Province::orderBy('id_propinsi','ASC')->get();
    //     $dd                          = array();
    //     if ($query->count() > 0){
    //         foreach($query as $row){
    //             $dd[$row->id_propinsi] = $row->nama_propinsi;
    //         }
    //     }
	// 	return $dd;
		
    // }

    // /////////// DORPDOWN KABUPATEN /////////////////
    // public static function dd_kabupaten($slug=FALSE){
    //     if($slug === FALSE){
	// 		$dd['']='Pilih Kota/Kab';
	// 		return $dd; 
	// 	}
    //     $query                      = City::where('id_kabkota','=',$slug)->get();
	// 	$dd['']                     = 'Pilih Kota/Kab';
	// 	if($query->count() > 0){
    //         foreach($query as $row){
    //             $dd[$row->id_kabkota]= $row->nama_kabkota;
    //         }
    //     }
    //     return $dd;    
    // }

    // /////////// DORPDOWN SEMUA KOTA /////////////////
    // public static function allkota(Request $request){
	// 	$provinsi_id                = $request->prov_id;
	// 	$query                      = City::where('id_propinsi','=',$provinsi_id)->orderBy('id_propinsi','ASC')->get();
	// 	if($query->count()> 0){
	// 		foreach($query as $row){
	// 			echo "<option value='".$row->id_kabkota."'>".$row->nama_kabkota."</option>";
	// 			}
	// 		}
	
	// }

    /////////// DORPDOWN LAYOUT /////////////////
    public static function dd_layout(){
        // $dd['page_with_sidebar']	= 'Page With Sidebar';
        $dd['fullwidth']			= 'Full Width';
        return $dd;
    }

    /////////// DORPDOWN LAYOUT /////////////////
    public static function dd_type(){
		$dd['']='---Type---';
		$dd['1']= 'Top';
		return $dd;
    }

    /////////// STATISTIK VISITOR /////////////////
    public static function generate_months($id = 'month') {
        //start the select tag
        $html = '<select class="form-control select2" id="' . $id . '" name="' . $id . '">"n"';
        $html .= '<option value="">-- Bulan --</option>"n"';
        //echo each month as an option    
        for ($i = 1; $i <= 12; $i++) {
            $timestamp = mktime(0, 0, 0, $i);
            $label = date("F", $timestamp);
            $html .= '<option value="' . $i . '">' . $label . '</option>"n"';
        }
        //close the select tag
        $html .= "</select>";

        return $html;
    }
    public static  function generate_years($id = 'year', $startYear = '', $endYear = '') {
        $startYear  = (strlen(trim($startYear)) ? $startYear : date('Y') - 10);
        $endYear    = (strlen(trim($endYear)) ? $endYear : date('Y'));

        if (!Applib::holds_int($startYear) || !Applib::holds_int($endYear)) {
            return 'Year must be integer value!';
        }

        if ((strlen(trim($startYear)) < 4) || (strlen(trim($endYear)) < 4)) {
            return 'Year must be 4 digits in length!';
        }

        if (trim($startYear) > trim($endYear)) {
            return 'Start Year cannot be greater than End Year!';
        }

        //start the select tag
        $html = '<select class="form-control select2" id="' . $id . '" name="' . $id . '">"n"';
        $html .= '<option value="">-- Tahun --</option>"n"';
        //echo each year as an option    
        for ($i = $endYear; $i >= $startYear; $i--) {
            $html .= '<option value="' . $i . '">' . $i . '</option>"n"';
        }
        //close the select tag
        $html .= "</select>";

        return $html;
    }

    private static function holds_int($str) {
        return preg_match("/^[1-9][0-9]*$/", $str);
    }

    public static function get_chart_data_for_month_year($month = 0, $year = 0) {
        if ($month == 0 && $year == 0) {
            $month  = date('m');
            $year   = date('Y');
            $query  = DB::table('statistiks')
                            ->select(DB::raw('sum(hits) as visits, sum(DATE_FORMAT(created_at,"%d-%m-%Y")) as day'))
                            ->whereMonth('created_at','=',$month)
                            ->whereYear('created_at','=',$year)
                            ->groupBy(DB::raw('DATE(created_at)'))
                            ->get();
            if ($query->count() > 0) {
                return $query;
            }
        }
        if ($month == 0 && $year > 0) {
                $query = DB::table('statistiks')
                            ->select(DB::raw('sum(hits) as visits, sum(DATE_FORMAT(timestamp,"%M")) as day'))
                            ->whereYear('created_at','=',$year)
                            ->groupBy(DB::raw('MONTH(created_at)'))
                            ->get();
            if ($query->count() > 0) {
                return $query;
            }
        }
        if ($year == 0 && $month > 0) {
            $year = date('Y');
                $query = DB::table('statistiks')
                            ->select(DB::raw('sum(hits) as visits, sum(DATE_FORMAT(created_at,"%d-%m-%Y")) as day'))
                            ->whereMonth('created_at','=',$month)
                            ->groupBy(DB::raw('DATE(created_at)'))
                            ->get();

            if ($query->count() > 0) {
                return $query;
            }
        }

        if ($year > 0 && $month > 0) {
                $query = DB::table('statistiks')
                            ->select(DB::raw('sum(hits) as visits, sum(DATE_FORMAT(created_at,"%d-%m-%Y")) as day'))
                            ->whereMonth('created_at','=',$month)
                            ->whereYear('created_at','=',$year)
                            ->groupBy(DB::raw('DATE(created_at)'))
                            ->get();

            if ($query->count() > 0) {
                return $query;
            }
        }

        return NULL;
    }

    public static function get_site_data_for_today() {
	    
        $query = DB::table('statistiks')
                    ->selectRaw('sum(hits) as visits')
                    ->whereRaw('CURDATE() = DATE(created_at)')
                    ->take(1)
                    ->get();
           
        if ($query->count() == 1) {
            $results= $query->pluck('visits');
        }

        return $results[0];
    }

    public static function pengunjungonline(){

        $bataswaktu     = time() - 300;
        $query          = DB::table('statistiks')
                            ->select('online as ol')
                            ->where('online','>',$bataswaktu)
                            ->get();
                            
            if ($query->count() == 1) {
                $query->pluck('visits');
            }

    }
    public static function get_site_data_for_last_week() {
        
        $query      = DB::table('statistiks')
                        ->selectRaw('sum(hits) as visits')
                        ->whereRaw('DATE(created_at) >= CURDATE() - INTERVAL DAYOFWEEK(CURDATE()) + 6 DAY')
                        ->whereRaw('DATE(created_at) < CURDATE() - INTERVAL DAYOFWEEK(CURDATE()) -1 DAY')
                        ->take(1)
                        ->get();

        if ($query->count() == 1) {
            $results= $query->pluck('visits');
        }
        return $results[0];

    }

    public static function get_chart_data_for_today() {
        
        $query = DB::table('statistiks')
                    ->selectRaw('sum(hits) as visits , DATE_FORMAT(created_at,"%h %p") AS hour')
                    ->whereRaw('CURDATE() = DATE(created_at)')
                    ->groupByRaw('created_at')
                    ->get();
                    
        if ($query->count() > 0) {
            return $query;
        }
        return NULL;
    }

     /////////// DORPDOWN LABEL /////////////////
     public static function dd_role(){
        $dd['']         = 'Pilih Role';
        $dd['admin']    = 'Admin';
        $dd['editor']   = 'Editor';
        return $dd;
    }

}