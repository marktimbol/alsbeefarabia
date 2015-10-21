var urlobj;

function BrowseServer(obj)
{
    urlobj = obj;
    OpenServerBrowser(
          'http://alsbeefarabia.dev/admin/filemanager',
          screen.width * 0.7,
          screen.height * 0.7
      ) ;
}

function OpenServerBrowser( url, width, height )
{
    var iLeft = (screen.width - width) / 2 ;
    var iTop = (screen.height - height) / 2 ;
    var sOptions = "scrollbars=yes,toolbar=no,status=no,resizable=yes,dependent=yes" ;
    sOptions += ",width=" + width ;
    sOptions += ",height=" + height ;
    sOptions += ",left=" + iLeft ;
    sOptions += ",top=" + iTop ;
    var oWindow = window.open( url, "BrowseWindow", sOptions ) ;
}

function setData( data )
{
  if( data.length > 0 ) {

      image = data[0];
      
      document.getElementById(urlobj).value = image.url;
  }
  oWindow = null;
}