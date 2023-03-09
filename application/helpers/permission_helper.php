<?php 


function is_login()
{
	$ci = get_instance();
	$logged_in = $ci->session->userdata('logged_in');

	$user = $ci->db->get_where('tbl_user',['email'=>$ci->session->userdata('email')]);

	if ($user->num_rows() < 1) {
		$ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum Login!</div>');
		redirect('sisfo/Auth');
	}
	elseif($logged_in != TRUE || empty($logged_in)){
		$ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum Login!</div>');
		redirect('sisfo/Auth');
	}
}

function is_guru()
{
	$ci = get_instance();
	$infoguru = $ci->session->userdata('infoguru');

	$user = $ci->db->get_where('tbl_user',['email'=>$ci->session->userdata('email')]);

	if ($user->num_rows() < 1) {
		$ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum Login!</div>');
		redirect('infoguru/Auth');
	}
	elseif($infoguru != TRUE || empty($infoguru)){
		$ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum Login!</div>');
		redirect('infoguru/Auth');
	}
}

//siswa
function is_siswa()
{
	$ci = get_instance();
	$infosiswa = $ci->session->userdata('infosiswa');

	$siswa = $ci->db->get_where('siswa',['email'=>$ci->session->userdata('email')]);

	if ($siswa->num_rows() < 1) {
		$ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum Login!</div>');
		redirect('infosiswa/Auth');
	}
	elseif($infosiswa != TRUE || empty($infosiswa)){
		$ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum Login!</div>');
		redirect('infosiswa/Auth');
	}
}

function is_login_presensi()
{
	$ci = get_instance();
	$logged_in = $ci->session->userdata('logged_in');

	$user = $ci->db->get_where('tbl_user',['email'=>$ci->session->userdata('email')]);

	if ($user->num_rows() < 1) {
		$ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum Login!</div>');
		redirect('presensi/Auth');
	}
	elseif($logged_in != TRUE || empty($logged_in)){
		$ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum Login!</div>');
		redirect('presensi/Auth');
	}
}

function cek_admin(){

	$ci = get_instance();
	$user = $ci->db->get_where('tbl_user',['email'=>$ci->session->userdata('email')]);

	if ($ci->session->userdata('id_level')!=1) {
		
		$ci->session->set_flashdata('message', "<script>swal('Galat!', 'Hak akses ditolak!', 'info');</script>");
        redirect('sisfo/Dashboard');
	}
}