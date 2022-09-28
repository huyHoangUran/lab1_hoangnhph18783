<?php
// Bài 1
    interface PhepTinh{
        function cong();
        function tru();
        function nhan();
        function chia();
    }
    class TinhToan implements PhepTinh{
        public $a;
        public $b;
        function cong(){
            $c= $this->a+$this->b;
            return "Tổng 2 số a,b là : $c";
        }
        function tru(){
            $c= $this->a-$this->b;

            return "Hiệu 2 số a,b là : ".$this->a - $this->b;

        }
        function nhan(){
            $c= $this->a*$this->b;

            return "Tích 2 số a,b là : ".$this->a * $this->b;

        }
        function chia(){
            $c= $this->a/$this->b;

            return "Thương 2 số a,b là : ".$this->a  / $this->b;

        }
    }
    $tinh= new TinhToan;
    $tinh->a=5;
    $tinh->b=2;
    echo $tinh->cong();
// Bài 2
    class ConNguoi{
        public $ten;
        public $tuoi;
        public $gioi_tinh;
        public $ngay_sinh;
        public $can_nang;
        public $chieu_cao;

    }
    class VanDongVien extends ConNguoi{
        public $so_huy_chuong;
        public $cac_mon_da_thi_dau;
        function __construct(){
            $this->ten="Nguyễn Huy Hoàng";
            $this->tuoi=20;
            $this->gioi_tinh = "Nam";
            $this->ngay_sinh = "15/12/2002";
            $this->chieu_cao = 170;
            $this->can_nang = 75;
            
            
        }
        public function hienThiThongTin(){
            $a="";
          for($i=0;$i<count($this->cac_mon_da_thi_dau);$i++){
            $a.=$this->cac_mon_da_thi_dau[$i].",";
          };
          rtrim($a,",");
            
            return "Ten: $this->ten, Tuoi: $this->tuoi ,So huy chuong: $a";        
         }

        public function ThiDau($monThi,$soHuyChuong){
            if($monThi == true){
                return "so huy chuong cua bạn la $soHuyChuong";
            }else{
                return "Bạn bị hủy toàn bộ huy chương";
            }
        }

    }
    class MonThiDau{
        public $tenMon;
        public $chieuCao;
        public $canNang;
        public function huyChuong(){
            if($this->canNang>=70 && $this->canNang <=80 ){
                if($this->chieuCao<170 && $this->chieuCao>150){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        
    }
    $a= new VanDongVien;
    echo "<pre></pre>";
    $a->ten="Hoang";
    $a->tuoi=19;
    $a->cac_mon_da_thi_dau=["Cầu Lông","Bóng Đá"];
    echo($a->hienThiThongTin());
   



    $monThiDau = new MonThiDau;
    $monThiDau->tenMon="Bơi lội";
    $monThiDau->canNang=70;
    $monThiDau->chieuCao=155 ;
    echo $monThiDau->huyChuong();
    echo"<pre>";
     echo($a->ThiDau($monThiDau->huyChuong(),20));

    


    


?>