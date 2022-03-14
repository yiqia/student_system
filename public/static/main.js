

function setIframeHeight(id, fj = 0) {
  try {
      var iframe = document.getElementById(id);
      if (iframe.attachEvent) {
          iframe.attachEvent("onload", function () {
              if(iframe.contentWindow.document.documentElement.scrollHeight>0) {
                  iframe.height = (iframe.contentWindow.document.documentElement.scrollHeight);
              }
          });
          return;
      } else {
          iframe.onload = function () {
              if(iframe.contentDocument.body.scrollHeight>0){
                  iframe.height = (iframe.contentDocument.body.scrollHeight);
              }
          };
          return;
      }
  } catch (e) {
      throw new Error('setIframeHeight Error');
  }
}
function iframeSrc(src) {
  $('#homeContent').attr('src',src);
  window.scrollTo(0,0);
  setIframeHeight('homeContent');
}
// 修改点击
function editClick(e,black){
  let parent = $(e).parent().parent();
  let children = parent.children();
  let data = {};
  [...children].forEach(item=>{
      item.dataset.name?data[item.dataset.name]=item.dataset.val:""
  })
  black(data);
}
window.onload=function (e) {

}