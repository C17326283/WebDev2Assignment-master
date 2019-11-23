function slide() 
{
    $(document.getElementById("menuSlide")).slideToggle(200);
}

function storeVals()
{
    saveSearch = document.getElementById("searchBar").value;
    saveType = document.getElementById("searchType").value;
    
    alert("saveSearch: "+saveSearch+
         "\nsaveType: "+saveType);
}
function restoreVals()
{
    document.getElementById("searchBar").value = saveSearch;
    document.getElementById("searchType").value = saveType;
}