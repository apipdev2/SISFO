<script>

	// var date = new Date();
 //    var tahun = date.getFullYear();
 //    var bulan = date.getMonth();
 //    var tanggal = date.getDate();
 //    var hari = date.getDay();
 //    var jam = date.getHours();
 //    var menit = date.getMinutes();
 //    var detik = date.getSeconds();

 function hari(hari){

 	switch(hari) {
     case 0: 
     	return "Minggu"; break;
     case 1: 
     	return "Senin"; break;
     case 2: 
     	return "Selasa"; break;
     case 3: 
     	return "Rabu"; break;
     case 4: 
     	return "Kamis"; break;
     case 5: 
     	return "Jum'at"; break;
     case 6: 
     	return "Sabtu"; break;
    }
 }

 function bulan(bulan){

 	switch(bulan) {
     case 0: 
     	return "Januari"; break;
     case 1: 
     	return "Februari"; break;
     case 2: 
     	return "Maret"; break;
     case 3: 
     	return "April"; break;
     case 4: 
     	return "Mei"; break;
     case 5: 
     	return "Juni"; break;
     case 6: 
     	return "Juli"; break;
     case 7: 
     	return "Agustus"; break;
     case 8: 
     	return "September"; break;
     case 9: 
     	return "Oktober"; break;
     case 10: 
     	return "November"; break;
     case 11: 
     	return "Desember"; break;
    }
 }
    
    
    var dateIndo = "Tanggal: " + hari + ", " + tanggal + " " + bulan + " " + tahun;
    var timeIndo = "Jam: " + jam + ":" + menit + ":" + detik;


</script>