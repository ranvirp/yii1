/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function populateDropdown(url,id)
{
     
      $.get(url,
          function(data)
          {
              data = $.parseJSON(data)
            
               
                var htmlToAppend='<option>None</option>';
              $.each(data,function(key,value)
         {
        htmlToAppend +="<option value='"+key+"'>" + value  + "</option>";
         });

                 
                 $('#'+id).html(htmlToAppend);    
}
);
}
function populateHtml(url,id)
{
     $.get(url,
          function(data)
          {
             $('#'+id).html(data); 
          });
}
