$(document).ready(function(){


   $('.col-md-9').hide();
   $('.col-md-9').fadeIn(1000);


   $('.a1').hide();
   $('.a2').hide();
   $('.a3').hide();
   $('.a4').hide();
   $('.a1').fadeIn(1000);
   $('.a2').fadeIn(1500);
   $('.a3').fadeIn(2000);
   $('.a4').fadeIn(2500);

   $('.ne').hide();
   $('.ne').fadeIn(1000);


	$('.kelasSatuIpa').hide();
	$('.k1').hide();
   
   	$('#toggleKelasSatuIpa').click(function(){
   		$('.k1').slideToggle(1000);
   		$('.kelasSatuIpa').slideToggle(1000);
   	});


   	$('.kelasSatuAgama').hide();
	$('.k2').hide();
   	$('#toggleKelasSatuAgama').click(function(){
   		$('.k2').slideToggle(1000);
   		$('.kelasSatuAgama').slideToggle(1000);
   	});


   	$('.kelasDuaIpa').hide();
	$('.k3').hide();
   	$('#toggleKelasDuaIpa').click(function(){
   		$('.k3').slideToggle(1000);
   		$('.kelasDuaIpa').slideToggle(1000);
   	});


   	$('.kelasDuaAgama').hide();
	$('.k4').hide();
   	$('#toggleKelasDuaAgama').click(function(){
   		$('.k4').slideToggle(1000);
   		$('.kelasDuaAgama').slideToggle(1000);
   	});

   	$('.kelasTigaIpa').hide();
	$('.k5').hide();
   	$('#toggleKelasTigaIpa').click(function(){
   		$('.k5').slideToggle(1000);
   		$('.kelasTigaIpa').slideToggle(1000);
   	});

   	$('.kelasTigaAgama').hide();
	$('.k6').hide();
   	$('#toggleKelasTigaAgama').click(function(){
   		$('.k6').slideToggle(1000);
   		$('.kelasTigaAgama').slideToggle(1000);
   	});

let logoJudulWebsite = document.getElementById('judulWebsite');
logoJudulWebsite.innerHTML = "School Database";


   var sPath = window.location.pathname.substring(1);
   var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
   $('.nav > li > a[href="' + sPage + '"]').parent().addClass('active');


});


let kelas1Ipa = document.getElementById('toggleKelasSatuIpa');
kelas1Ipa.innerHTML = 'Kelas X Ipa';

let kelas1Agm = document.getElementById('toggleKelasSatuAgama');
kelas1Agm.innerHTML = 'Kelas X Agama';

let kelas2Ipa = document.getElementById('toggleKelasDuaIpa');
kelas2Ipa.innerHTML = 'Kelas XI Ipa';

let kelas2Agm = document.getElementById('toggleKelasDuaAgama');
kelas2Agm.innerHTML = 'Kelas XI Agama';

let kelas3Ipa = document.getElementById('toggleKelasTigaIpa');
kelas3Ipa.innerHTML = 'Kelas XII Ipa';

let kelas3Agm = document.getElementById('toggleKelasTigaAgama');
kelas3Agm.innerHTML = 'Kelas XII Agama';

let tblKelas = document.getElementsByClassName('tombols');
for (var i = 0; i <= tblKelas.length; i++){
	tblKelas[i].style.border = 'none';
	tblKelas[i].style.color = 'white';
	tblKelas[i].style.background = '#302826';
	tblKelas[i].style.width = '100%';
	tblKelas[i].style.padding = '30px';
	tblKelas[i].style.fontFamily = 'Font Antipasto';
	tblKelas[i].style.fontSize = '30px';
	tblKelas[i].style.marginBottom = '10px';
   tblKelas[i].style.borderLeft = '22px solid #483a3a';

}



