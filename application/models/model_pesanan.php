<?php
class model_pesanan extends ci_model
{
    
    
    function simpan_barang()//fungsi
    {
        $nama_barang    =  $this->input->post('barang');
        $jumlah            =  $this->input->post('jumlah');
        $idbarang       = $this->db->get_where('barang',array('nama_barang'=>$nama_barang))->row_array();
        $data           = array('barang_id'=>$idbarang['barang_id'],//mneyimpan data berdasarkan idbarang
                                'jumlah'=>$jumlah,
                                'harga'=>$idbarang['harga'],
                                'status'=>'0');
        $this->db->insert('pesanan_detail',$data);//memasukkan ke database table pesanan detail
    }
    
    function tampilkan_detail_pesanan()
    {//fungsi sql
        $query  ="SELECT td.p_detail_id,td.jumlah,td.harga,b.nama_barang
                FROM pesanan_detail as td,barang as b
                WHERE b.barang_id=td.barang_id and td.status='0'";
        return $this->db->query($query);
    }
    
    function hapusitem($id)//fungsi hapus barang
    {
        $this->db->where('p_detail_id',$id);
        $this->db->delete('pesanan_detail');
    }
    
    
    function selesai_belanja($data)//jika sudah menekan submit
    {
        $this->db->insert('pesanan',$data);
        $last_id=  $this->db->query("select pesanan_id from pesanan order by pesanan_id desc")->row_array();
        $this->db->query("update pesanan_detail set pesanan_id='".$last_id['pesanan_id']."' where status='0'");//untuk update pesanan berdasarkan pesanan id ketika belum dibayar
        $this->db->query("update pesanan_detail set status='1' where status='0'");//ketika mengklik tombol selesai
    }
    
    
    function laporan_default()
    {
        $query="SELECT t.tanggal_pesanan,o.nama_lengkap,sum(td.harga*td.jumlah) as total
                FROM pesanan as t,pesanan_detail as td,pegawai o
                WHERE td.pesanan_id=t.pesanan_id and o.user_id=t.user_id
                group by t.pesanan_id";
        return $this->db->query($query);
    }
    
    function laporan_periode($tanggal1,$tanggal2)
    {
        $query="SELECT t.tanggal_pesanan,o.nama_lengkap,sum(td.harga*td.jumlah) as total
                FROM pesanan as t,pesanan_detail as td,pegawai as o
                WHERE td.pesanan_id=t.pesanan_id and o.user_id=t.user_id 
                and t.tanggal_pesanan between '$tanggal1' and '$tanggal2'
                group by t.pesanan_id";
        return $this->db->query($query);
    }
}