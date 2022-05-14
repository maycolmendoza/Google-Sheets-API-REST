function doGet(e) {

  var sheet= SpreadsheetApp.getActive();
var nse = sheet.getSheetByName('Taller');
var data = [];
var rlen= nse.getLastRow();
var clen= nse.getLastColumn();
var rows =nse.getRange(1,1,rlen,clen).getValues();
for(var i =0;i< rows.length;i++){
var datarow= rows[i];
var record={};
for(var j=1;j<clen; j++){
record[rows[0][j]]=datarow[j];
}
data.push(record);
}

var result = JSON.stringify(data);
return ContentService.createTextOutput(result).setMimeType(ContentService.MimeType.JSON);
  
}
