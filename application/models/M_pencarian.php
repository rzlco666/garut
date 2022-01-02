<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pencarian extends CI_Model
{

    public function pencarian_w($kategori, $nama, $sort_by)
    {
        //$this->db->select('*');
        //$this->db->from('wisata');
        //$this->db->like('nama', $nama, 'both');

        if($sort_by == 0){
            return $this->db->query("SELECT w.id_wisata, w.nama, w.lokasi, w.maps, w.harga, w.deskripsi,
            w.thumbnail, w.header, w.destinasi1, w.destinasi2, w.destinasi3, w.id_petugas,
            IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating_wisata WHERE id_wisata=w.id_wisata GROUP BY id_wisata), 0) AS rating,
            IFNULL((SELECT COUNT(id_rating_wisata) FROM rating_wisata WHERE id_wisata=w.id_wisata GROUP BY id_wisata), 0) AS jumlah
            FROM wisata w
            WHERE w.nama LIKE '%$nama%'
            ORDER BY jumlah DESC");
        }elseif($sort_by == 1){
            return $this->db->query("SELECT w.id_wisata, w.nama, w.lokasi, w.maps, w.harga, w.deskripsi,
            w.thumbnail, w.header, w.destinasi1, w.destinasi2, w.destinasi3, w.id_petugas,
            IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating_wisata WHERE id_wisata=w.id_wisata GROUP BY id_wisata), 0) AS rating,
            IFNULL((SELECT COUNT(id_rating_wisata) FROM rating_wisata WHERE id_wisata=w.id_wisata GROUP BY id_wisata), 0) AS jumlah
            FROM wisata w
            WHERE w.nama LIKE '%$nama%'
            ORDER BY rating DESC");
        }elseif($sort_by == 2){
            return $this->db->query("SELECT w.id_wisata, w.nama, w.lokasi, w.maps, w.harga, w.deskripsi,
            w.thumbnail, w.header, w.destinasi1, w.destinasi2, w.destinasi3, w.id_petugas,
            IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating_wisata WHERE id_wisata=w.id_wisata GROUP BY id_wisata), 0) AS rating,
            IFNULL((SELECT COUNT(id_rating_wisata) FROM rating_wisata WHERE id_wisata=w.id_wisata GROUP BY id_wisata), 0) AS jumlah
            FROM wisata w
            WHERE w.nama LIKE '%$nama%'
            ORDER BY w.harga ASC");
        }elseif($sort_by == 3){
            return $this->db->query("SELECT w.id_wisata, w.nama, w.lokasi, w.maps, w.harga, w.deskripsi,
            w.thumbnail, w.header, w.destinasi1, w.destinasi2, w.destinasi3, w.id_petugas,
            IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating_wisata WHERE id_wisata=w.id_wisata GROUP BY id_wisata), 0) AS rating,
            IFNULL((SELECT COUNT(id_rating_wisata) FROM rating_wisata WHERE id_wisata=w.id_wisata GROUP BY id_wisata), 0) AS jumlah
            FROM wisata w
            WHERE w.nama LIKE '%$nama%'
            ORDER BY w.harga DESC");
        }else{
            return $this->db->query("SELECT w.id_wisata, w.nama, w.lokasi, w.maps, w.harga, w.deskripsi,
            w.thumbnail, w.header, w.destinasi1, w.destinasi2, w.destinasi3, w.id_petugas,
            IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating_wisata WHERE id_wisata=w.id_wisata GROUP BY id_wisata), 0) AS rating,
            IFNULL((SELECT COUNT(id_rating_wisata) FROM rating_wisata WHERE id_wisata=w.id_wisata GROUP BY id_wisata), 0) AS jumlah
            FROM wisata w
            WHERE w.nama LIKE '%$nama%'
            ORDER BY w.id_wisata DESC");
        }
    }

    public function pencarian_e($kategori, $nama, $sort_by)
    {
        if($sort_by == 0){
            return $this->db->query("SELECT w.id_event, w.nama, w.lokasi, w.maps, w.harga, w.deskripsi,
            w.thumbnail, w.header, w.event1, w.event2, w.event3, w.id_petugas,
            IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating_event WHERE id_event=w.id_event GROUP BY id_event), 0) AS rating,
            IFNULL((SELECT COUNT(id_rating_event) FROM rating_event WHERE id_event=w.id_event GROUP BY id_event), 0) AS jumlah
            FROM event w
            WHERE w.nama LIKE '%$nama%'
            ORDER BY jumlah DESC");
        }elseif($sort_by == 1){
            return $this->db->query("SELECT w.id_event, w.nama, w.lokasi, w.maps, w.harga, w.deskripsi,
            w.thumbnail, w.header, w.event1, w.event2, w.event3, w.id_petugas,
            IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating_event WHERE id_event=w.id_event GROUP BY id_event), 0) AS rating,
            IFNULL((SELECT COUNT(id_rating_event) FROM rating_event WHERE id_event=w.id_event GROUP BY id_event), 0) AS jumlah
            FROM event w
            WHERE w.nama LIKE '%$nama%'
            ORDER BY rating DESC");
        }elseif($sort_by == 2){
            return $this->db->query("SELECT w.id_event, w.nama, w.lokasi, w.maps, w.harga, w.deskripsi,
            w.thumbnail, w.header, w.event1, w.event2, w.event3, w.id_petugas,
            IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating_event WHERE id_event=w.id_event GROUP BY id_event), 0) AS rating,
            IFNULL((SELECT COUNT(id_rating_event) FROM rating_event WHERE id_event=w.id_event GROUP BY id_event), 0) AS jumlah
            FROM event w
            WHERE w.nama LIKE '%$nama%'
            ORDER BY w.harga ASC");
        }elseif($sort_by == 3){
            return $this->db->query("SELECT w.id_event, w.nama, w.lokasi, w.maps, w.harga, w.deskripsi,
            w.thumbnail, w.header, w.event1, w.event2, w.event3, w.id_petugas,
            IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating_event WHERE id_event=w.id_event GROUP BY id_event), 0) AS rating,
            IFNULL((SELECT COUNT(id_rating_event) FROM rating_event WHERE id_event=w.id_event GROUP BY id_event), 0) AS jumlah
            FROM event w
            WHERE w.nama LIKE '%$nama%'
            ORDER BY w.harga DESC");
        }else{
            return $this->db->query("SELECT w.id_event, w.nama, w.lokasi, w.maps, w.harga, w.deskripsi,
            w.thumbnail, w.header, w.event1, w.event2, w.event3, w.id_petugas,
            IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating_event WHERE id_event=w.id_event GROUP BY id_event), 0) AS rating,
            IFNULL((SELECT COUNT(id_rating_event) FROM rating_event WHERE id_event=w.id_event GROUP BY id_event), 0) AS jumlah
            FROM event w
            WHERE w.nama LIKE '%$nama%'
            ORDER BY w.id_wisata DESC");
        }
    }
}
