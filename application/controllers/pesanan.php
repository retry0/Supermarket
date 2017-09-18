<?php
class pesanan extends ci_controller{
    
        function __construct() {
        parent::__construct();
        $this->load->model(array('model_barang','model_pesanan'));//akan membuka model barang dan model pesanan
        chek_session();
    }
    
    function index()
    {
        if(isset($_POST['submit']))
        {
            $this->model_pesanan->simpan_barang();
            redirect('pesanan');
        }
        else
        {
            $data['barang']=  $this->model_barang->tampil_data();
            $data['detail']= $this->model_pesanan->tampilkan_detail_pesanan()->result();
            $this->home->load('home','pesanan/form_pesanan',$data);
        }
    }
    
    
    function hapusitem()//hapus barang pesanan
    {
        $id=  $this->uri->segment(3);
        $this->model_pesanan->hapusitem($id); //hapus berdasarkan id
        redirect('pesanan');
    }
    
    
    function selesai_belanja()//fungsi selesai_belanja
    {
        $tanggal=date('Y-m-d');//berdasarkan tanggal
        $pegawai=  $this->session->userdata('username');
        $id_op=  $this->db->get_where('pegawai',array('username'=>$pegawai))->row_array();
        $data=array('user_id'=>$id_op['user_id'],'tanggal_pesanan'=>$tanggal);
        $this->model_pesanan->selesai_belanja($data);
        redirect('pesanan');
    }
    
    
    function laporan()//fungsi cetak laporan
    {
        if(isset($_POST['submit']))
        {
            $tanggal1=  $this->input->post('tanggal1');//berdasarkan tanggal
            $tanggal2=  $this->input->post('tanggal2');
            $data['record']=  $this->model_pesanan->laporan_periode($tanggal1,$tanggal2);
            $this->home->load('home','pesanan/laporan',$data);
        }
        else
        {
            $data['record']=  $this->model_pesanan->laporan_default();
            $this->home->load('home','pesanan/laporan',$data);//membuka tampilan cetak pada folder view/pesanan/laporan
        }
    }
    
    function pdf()//fungsi cetak laporan pdf
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(10, 10, 'LAPORAN PESANAN');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(27, 7, 'Tanggal', 1,0);
        $pdf->Cell(30, 7, 'Pegawai', 1,0);
        $pdf->Cell(38, 7, 'Total Pesanan', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data=  $this->model_pesanan->laporan_default();
        $no=1;
        $total=0;
        foreach ($data->result() as $r)//pengulangan tabel
        {
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(27, 7, $r->tanggal_pesanan, 1,0);
            $pdf->Cell(30, 7, $r->nama_lengkap, 1,0);
            $pdf->Cell(38, 7, $r->total, 1,1);
            $no++;
            $total=$total+$r->total;
        }
        // end
        $pdf->Cell(67,7,'Total',1,0,'R');
        $pdf->Cell(38,7,$total,1,0);
        $pdf->Output();
    }
}