function startCalc(){

    interval = setInterval("calc()",1);}
    
    function calc(){
    
    one = document.autoSumForm.harga.value;
    
    two = document.autoSumForm.jumlah.value;
    
    three = document.autoSumForm.diskon.value;
    
    document.autoSumForm.total.value = (one * 1) * (two * 1) - (three * 1);}
    
    function stopCalc(){
    
    clearInterval(interval);}