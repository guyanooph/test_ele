/**
 * 发送ajax函数
 *
 * @param data
 * @param sendUrl
 * @param back
 * @author zhangyuchao
 */
function sendAjax(data, sendUrl, back) {
    $.ajax({
        type: "post",
        url: sendUrl,
        data: data,
        datatype: "json",
        success: function (data) {
            //alert(response);
            back(data);
        }
    })
}
// function sendAjax(data, sendUrl, back) {
//     $.ajax(
//         type: "post",
//         url: sendUrl,
//         data: data,
//         datatype: "text",
//         success: function (data) {
//             return data;
//             //alert(response);
//             //back(response);
//             // if(data == 'y'){
//             //     echo "验证码已发送";
//             // }else{
//             //     echo "ALREAD USE";
//             // }
//         }
//     })
// }