<!-- jQuery 3 -->
<script src="{{ asset ('js/jquery.min.js') }}"></script>
<script src="{{ asset ('js/jquery-ui.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset ('js/bootstrap.min.js') }}"></script>
<script src="{{ asset ('js/twitter-bootstrap.js') }}"></script>
<!-- SweetAlert -->
<script src="{{ asset ('js/sweetalert.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset ('js/toastr.min.js') }}"></script>

<script>
	//Confirmation suppression Utilisateur
	function confirmSup(){
	 var x = confirm("Etes vous sûr de vouloir supprimer cet utilisateur ?");
      if (x){
        toastr.success('<b>Message</b> </br> L\'utilisateur a été bien supprimé').show(25);
          return true;
      }else{
          return false;	    
      }
	 }
 //Confirmation modification Utilisateur
    function confirmMod(){
   var x = confirm("Etes vous sûr de vouloir modifier cet utilisateur ?");
      if (x){
          return true;
      }else{
          return false;     
      }
   }

   //Confirmation Ajout Utilisateur
    function confirmAdd(){
   var x = confirm("Etes vous sûr de vouloir ajout cet utilisateur ?");
      if (x){
          return true;
      }else{
          return false;     
      }
   }


   //Recherche utilisateur

   function rechercheUser(){
    document.getElementById("myFormSearch").submit();
   }

</script>