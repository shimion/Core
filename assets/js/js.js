 jQuery(document).ready(function($) {
	   $(".datepickertime").datetimepicker({
        showOtherMonths: true,
        closeText: 'Close',
        dateFormat: 'y-m-d'
      });
	  
	  
	 $('.datepicker').datepicker({
        showOtherMonths: true,
        showButtonPanel: true,
       // currentText: co_re.date_current,
        closeText: 'Close',
        dateFormat: 'y-m-d'
      });

	  
		$('.coa').removeClass('iamworking');
	$('.coa').on( "change", 'select', function(e){
		$('.cose_of_action_detail').hide();
		$(this).parents('.coa').addClass('iamworking');
			var valuer = $(this).val();
			$('.iamworking .cose_of_action_detail').show();
			if( valuer == '1'){
				var text = '1st The American Academy of Pediatrics is an organization of 60,000 primary care pediatricians, pediatric medical subspecialists and pediatric surgical specialists dedicated to the health, safety and well-being of infants, children, adolescents and young adults. For more informatio. Sometimes you can say more with less. A simple statement describing exactly what your company does gives readers the information they need quickly. Such boilerplates are extremely effective when they complete educational press releases like the one this accompanied, which detailed new guidelines to prevent cheerleading injuries.';
			}else if( valuer == '2'){
				var text = '2nd The American Academy of Pediatrics is an organization of 60,000 primary care pediatricians, pediatric medical subspecialists and pediatric surgical specialists dedicated to the health, safety and well-being of infants, children, adolescents and young adults. For more informatio. Sometimes you can say more with less. A simple statement describing exactly what your company does gives readers the information they need quickly. Such boilerplates are extremely effective when they complete educational press releases like the one this accompanied, which detailed new guidelines to prevent cheerleading injuries.';
			}else if( valuer == '3'){
				var text = '3rd The American Academy of Pediatrics is an organization of 60,000 primary care pediatricians, pediatric medical subspecialists and pediatric surgical specialists dedicated to the health, safety and well-being of infants, children, adolescents and young adults. For more informatio. Sometimes you can say more with less. A simple statement describing exactly what your company does gives readers the information they need quickly. Such boilerplates are extremely effective when they complete educational press releases like the one this accompanied, which detailed new guidelines to prevent cheerleading injuries.';
			}else if( valuer == '4'){
				var text = '4th The American Academy of Pediatrics is an organization of 60,000 primary care pediatricians, pediatric medical subspecialists and pediatric surgical specialists dedicated to the health, safety and well-being of infants, children, adolescents and young adults. For more informatio. Sometimes you can say more with less. A simple statement describing exactly what your company does gives readers the information they need quickly. Such boilerplates are extremely effective when they complete educational press releases like the one this accompanied, which detailed new guidelines to prevent cheerleading injuries.';
			}else if( valuer == '5'){
				var text = '5th The American Academy of Pediatrics is an organization of 60,000 primary care pediatricians, pediatric medical subspecialists and pediatric surgical specialists dedicated to the health, safety and well-being of infants, children, adolescents and young adults. For more informatio. Sometimes you can say more with less. A simple statement describing exactly what your company does gives readers the information they need quickly. Such boilerplates are extremely effective when they complete educational press releases like the one this accompanied, which detailed new guidelines to prevent cheerleading injuries.';
				}
			
			$('.iamworking .boilerplate_example').text(text);
		});



 });