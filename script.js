function loginbtn(){

   var email = document.getElementById("emails").value;
   var pw = document.getElementById("pws").value;

   var f = new FormData();

   f.append("email",email);
   f.append("pw",pw);

   var r = new XMLHttpRequest();

   r.onreadystatechange = function(){
    if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success"){
            window.location = "home.php";
        } else {
            document.getElementById("msg2").innerHTML = t;
        }
    }
   };

   r.open("POST","signinProcess.php",true);
   r.send(f);


}
function singleProductView(){
    alert("ok");
}
function spview(){
    window.location = "singleProductView.php";
}
function deletehere(){
    alert("delete successful");
}

function toggle(){
   var dnonetoggle2= document.getElementById("dnonetoggle2");
   var dnonetoggle1= document.getElementById("dnonetoggle1");
   dnonetoggle2.className="d-block";

//    for(var x =0; x <=10; x++){
//     var dnonetoggle3= document.getElementById("dnonetoggle2"+x);
  
//    dnonetoggle3.id="dnonetoggle2";
//    dnonetoggle2.className="d-block";

   
//    }
}
function cartis(){
    window.location = "cart.php";
}

function product(){
    
    var product = document.getElementById("product");
    var user = document.getElementById("user");

    product.classList.toggle("d-none");
    user.classList.toggle("d-none");

}
function adminsignin(){
    window.location = "adminPanel.php";
}

function customerRgi(){
    // alert("ok");

    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var cemail = document.getElementById("cemail").value;
    var pw = document.getElementById("pw").value;
    var gender = document.getElementById("gender").value;

    var f = new FormData();
    f.append ("fname",fname);
    f.append ("lname",lname);
    f.append ("email",email);
    f.append ("cemail",cemail);
    f.append ("pw",pw);
    f.append ("gender",gender);
    
    
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
     if(r.readyState == 4){
        var t = r.responseText;
     if(t == "success"){
        document.getElementById("msg").innerHTML = t;
        document.getElementById("msg").className = "alert text-success fw-bold";
        document.getElementById("msgdiv").className = "d-block";
    } else {
        document.getElementById("msg").innerHTML = t;
        document.getElementById("msgdiv").className = "d-block";
    
     }
     }
    };

    r.open("POST","userRegiProcess.php",true);
    r.send(f);
}



function colouradd(){
    var addedclr = document.getElementById("clr_in").value;
    
    var f = new FormData();
    f.append("clr",addedclr);

    var r= new XMLHttpRequest();
    r.onreadystatechange = function (){
        if(r.readyState==4&r.status==200){
          var t = r.responseText;
          if(t=="success"){
            alert("colour added");
            window.location.reload();
          }else{
            alert("please try again");
          }
        }
    };

    r.open("POST","colouradd.php",true);
    r.send(f);

}

function loarditems(){

var category = document.getElementById("category").value;
var r= new XMLHttpRequest();
r.onreadystatechange = function(){
    if(r.readyState ==4){
        var t= r.responseText;
        // alert(t);
        document.getElementById("items").innerHTML = t;
    }
};
r.open("GET","loardItems.php?category="+category,true);
r.send();

}

function loardtypes(){

    var category = document.getElementById("items").value;
    var r= new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState ==4){
            var t= r.responseText;
            // alert(t);
            document.getElementById("type").innerHTML = t;
        }
    };
    r.open("GET","loardTypes.php?category="+category,true);
    r.send();
    
    }

function uploadproductimg(){
  
    var image = document.getElementById("imageuploader");
    // alert("ok");
      image.onchange = function(){
        var file_length = image.files.length;
    
        if(file_length <= 3){
    
          for(var x = 0 ; x < file_length ; x++){
            
            var file = this.files[x];
    
            var url = window.URL.createObjectURL(file);
    
            document.getElementById("i"+x).src=url;
            // alert(url);
          }
    
        }else{
          alert("Please selcet 3 or lesss than 3 images");
        }
      }
    }
    
    function addProduct() {
        var category = document.getElementById("category");
        var items = document.getElementById("items");
        var type = document.getElementById("type");
        var title = document.getElementById("title");
    
        var condition = 0;
        if (document.getElementById("b").checked) {
            condition = 1;
        } else if (document.getElementById("u").checked) {
            condition = 2;
        }
    
        var colour = document.getElementById("clr");
        var colour_input = document.getElementById("clr_in");
        var qty = document.getElementById("qty");
        var cost = document.getElementById("cost");
        var dwc = document.getElementById("dwc");
        var doc = document.getElementById("doc");
        var desc = document.getElementById("desc");
        var image = document.getElementById("imageuploader");
    // alert(category.value);
    // alert(items.value);
    // alert(type.value);
    // alert(title.value);
    // alert(condition);
    // alert(colour.value);
    // alert(colour_input.value);
    // alert(qty.value);
    // alert(cost.value);
    // alert(dwc.value);
    // alert(doc.value);
    // alert(desc.value);
// alert(image.value);
        var f = new FormData();
    
        f.append("ca", category.value);
        f.append("b", items.value);
        f.append("m", type.value);
        f.append("t", title.value);
        f.append("con", condition);
        f.append("col", colour.value);
        f.append("col_in", colour_input.value);
        f.append("qty", qty.value);
        f.append("cost", cost.value);
        f.append("dwc", dwc.value);
        f.append("doc", doc.value);
        f.append("desc", desc.value);
    
        
        var file_count = image.files.length;
    
        for (var x = 0; x < file_count; x++) {
            f.append("image" + x, image.files[x]);
        }
    
        var r = new XMLHttpRequest();
    
        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                var t = r.responseText;
                if(t == "Product image saved successfully"){
                    window.location.reload();
                }else{
                    alert(t);
                }
            }
        }
    
        r.open("POST", "addProductProcess.php", true);
        r.send(f);
    }

    function viewProductProcess(x){ 
window.location="viewProduct.php";
 
     r.open("GET","viewProduct.php?page="+x,true);
     r.send(f);
 }

 function viewProductProcessom(x){ 
    window.location="viewProductom.php";
     
         r.open("GET","viewProductom.php?page="+x,true);
         r.send(f);
     }
     function viewProductProcessf(x){ 
        window.location="viewProductf.php";
         
             r.open("GET","viewProductf.php?page="+x,true);
             r.send(f);
         }
         function viewProductProcesspm(x){ 
            window.location="viewProductpm.php";
             
                 r.open("GET","viewProductpm.php?page="+x,true);
                 r.send(f);
             }
             function viewProductProcesspc(x){ 
                window.location="viewProductpc.php";
                 
                     r.open("GET","viewProductpc.php?page="+x,true);
                     r.send(f);
                 }
                 function viewProductProcessoh(x){ 
                    window.location="viewProductoh.php";
                     
                         r.open("GET","viewProductoh.php?page="+x,true);
                         r.send(f);
                     }
                     function viewProductProcessfp(x){ 
                        window.location="viewProductfp.php";
                         
                             r.open("GET","viewProductfp.php?page="+x,true);
                             r.send(f);
                         }
function clearSorts(){
    window.location.reload();
}                         
function sort(x){
// alert("ok");
var price = "0";

if(document.getElementById("pricehigh").checked) {
    price ="1";

}else if(document.getElementById("pricelow").checked){
    price ="2";
}

var brand = "0";

if(document.getElementById("brand").checked) {
    brand ="1";

}else if(document.getElementById("used").checked){
    brand ="2";
}

var pro = "0";

if(document.getElementById("newest").checked) {
    pro ="1";

}else if(document.getElementById("allproduct").checked){
    pro ="2";
}

var f = new FormData();
f.append("price",price);
f.append("brand", brand);
f.append("pro", pro);
f.append("page",x);

var r = new XMLHttpRequest();

r.onreadystatechange = function(){
    if(r.readyState == 4){
        var t = r.responseText;
        // alert(t);

        document.getElementById("sortView").innerHTML =t;
    }
}

r.open("POST","sortProcess.php",true);
r.send(f);

}

function sortpm(x){
    // alert("ok");
    var price = "0";
    
    if(document.getElementById("pricehigh").checked) {
        price ="1";
    
    }else if(document.getElementById("pricelow").checked){
        price ="2";
    }
    
    var brand = "0";
    
    if(document.getElementById("brand").checked) {
        brand ="1";
    
    }else if(document.getElementById("used").checked){
        brand ="2";
    }
    
    var pro = "0";
    
    if(document.getElementById("newest").checked) {
        pro ="1";
    
    }else if(document.getElementById("allproduct").checked){
        pro ="2";
    }
    
    var f = new FormData();
    f.append("price",price);
    f.append("brand", brand);
    f.append("pro", pro);
    f.append("page",x);
    
    var r = new XMLHttpRequest();
    
    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            // alert(t);
    
            document.getElementById("sortViewpm").innerHTML =t;
        }
    }
    
    r.open("POST","sortProcesspm.php",true);
    r.send(f);
    
}

function sortpc(x){
        // alert("ok");
        var price = "0";
        
        if(document.getElementById("pricehigh").checked) {
            price ="1";
        
        }else if(document.getElementById("pricelow").checked){
            price ="2";
        }
        
        var brand = "0";
        
        if(document.getElementById("brand").checked) {
            brand ="1";
        
        }else if(document.getElementById("used").checked){
            brand ="2";
        }
        
        var pro = "0";
        
        if(document.getElementById("newest").checked) {
            pro ="1";
        
        }else if(document.getElementById("allproduct").checked){
            pro ="2";
        }
        
        var f = new FormData();
        f.append("price",price);
        f.append("brand", brand);
        f.append("pro", pro);
        f.append("page",x);
        
        var r = new XMLHttpRequest();
        
        r.onreadystatechange = function(){
            if(r.readyState == 4){
                var t = r.responseText;
                // alert(t);
        
                document.getElementById("sortViewpc").innerHTML =t;
            }
        }
        
        r.open("POST","sortProcesspc.php",true);
        r.send(f);
        
}

function sortom(x){
    // alert("ok");
    var price = "0";
    
    if(document.getElementById("pricehigh").checked) {
        price ="1";
    
    }else if(document.getElementById("pricelow").checked){
        price ="2";
    }
    
    var brand = "0";
    
    if(document.getElementById("brand").checked) {
        brand ="1";
    
    }else if(document.getElementById("used").checked){
        brand ="2";
    }
    
    var pro = "0";
    
    if(document.getElementById("newest").checked) {
        pro ="1";
    
    }else if(document.getElementById("allproduct").checked){
        pro ="2";
    }
    
    var f = new FormData();
    f.append("price",price);
    f.append("brand", brand);
    f.append("pro", pro);
    f.append("page",x);
    
    var r = new XMLHttpRequest();
    
    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            // alert(t);
    
            document.getElementById("sortViewom").innerHTML =t;
        }
    }
    
    r.open("POST","sortProcessom.php",true);
    r.send(f);
    
}

function sortoh(x){
    // alert("ok");
    var price = "0";
    
    if(document.getElementById("pricehigh").checked) {
        price ="1";
    
    }else if(document.getElementById("pricelow").checked){
        price ="2";
    }
    
    var brand = "0";
    
    if(document.getElementById("brand").checked) {
        brand ="1";
    
    }else if(document.getElementById("used").checked){
        brand ="2";
    }
    
    var pro = "0";
    
    if(document.getElementById("newest").checked) {
        pro ="1";
    
    }else if(document.getElementById("allproduct").checked){
        pro ="2";
    }
    
    var f = new FormData();
    f.append("price",price);
    f.append("brand", brand);
    f.append("pro", pro);
    f.append("page",x);
    
    var r = new XMLHttpRequest();
    
    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            // alert(t);
    
            document.getElementById("sortViewoh").innerHTML =t;
        }
    }
    
    r.open("POST","sortProcessoh.php",true);
    r.send(f);
    
}

function sortfp(x){
        // alert("ok");
        var price = "0";
        
        if(document.getElementById("pricehigh").checked) {
            price ="1";
        
        }else if(document.getElementById("pricelow").checked){
            price ="2";
        }
        
        var brand = "0";
        
        if(document.getElementById("brand").checked) {
            brand ="1";
        
        }else if(document.getElementById("used").checked){
            brand ="2";
        }
        
        var pro = "0";
        
        if(document.getElementById("newest").checked) {
            pro ="1";
        
        }else if(document.getElementById("allproduct").checked){
            pro ="2";
        }
        
        var f = new FormData();
        f.append("price",price);
        f.append("brand", brand);
        f.append("pro", pro);
        f.append("page",x);
        
        var r = new XMLHttpRequest();
        
        r.onreadystatechange = function(){
            if(r.readyState == 4){
                var t = r.responseText;
                // alert(t);
        
                document.getElementById("sortViewfp").innerHTML =t;
            }
        }
        
        r.open("POST","sortProcessfp.php",true);
        r.send(f);
        
}

function sortf(x){
    // alert("ok");
    var price = "0";
    
    if(document.getElementById("pricehigh").checked) {
        price ="1";
    
    }else if(document.getElementById("pricelow").checked){
        price ="2";
    }
    
    var brand = "0";
    
    if(document.getElementById("brand").checked) {
        brand ="1";
    
    }else if(document.getElementById("used").checked){
        brand ="2";
    }
    
    var pro = "0";
    
    if(document.getElementById("newest").checked) {
        pro ="1";
    
    }else if(document.getElementById("allproduct").checked){
        pro ="2";
    }
    
    var f = new FormData();
    f.append("price",price);
    f.append("brand", brand);
    f.append("pro", pro);
    f.append("page",x);
    
    var r = new XMLHttpRequest();
    
    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            // alert(t);
    
            document.getElementById("sortViewf").innerHTML =t;
        }
    }
    
    r.open("POST","sortProcessf.php",true);
    r.send(f);
    
}

function loadMainImg(id) { 
    
    var img = document.getElementById("productImg" + id).src;
    var main = document.getElementById("main_img");
    // main.style.backgroundImage = 'url("+img+")';
    main.style.backgroundImage = " url('"+img+"')";


 }
function addToWatchlist(pid){

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "removed"){
                document.getElementById("heart"+pid).style.className="text-dark";
                window.location.reload();
            }else if( t== "added"){
                document.getElementById("heart"+pid).style.className="text-danger";
                window.location.reload();
            }else{
                alert(t);
            }
        }
    };

    r.open("GET","addToWatchlistProcess.php?pid="+pid,true);
    r.send();
}

function checkValue(qty){
var input_qty = document.getElementById("qty_input");

if(input_qty.value <= 0){
    alert("Quantitiy must be 1 or more.");
    input_qty.value = 1;
}else if(input_qty.value > qty){
    alert ("Maximum quantity achieved.");
    input_qty.value = qty;
}
}

function payment(pid){

            var qty = document.getElementById("qty_input").value;

            var r =new XMLHttpRequest();
        
        r.onreadystatechange = function(){
            if(r.readyState == 4){
                var t = r.responseText;
                alert("please wait...");
                var obj = JSON.parse(t);
        
                var mail = obj["umail"];
                var amount = obj["amount"];
        var orderId =obj["id"];
                if(t == 1){
                    alert("Please login");
                    window.location ="index.php";
        
                }else if(t == 2){
                    alert("Please update your profile first");
                    window.location ="userProfile.php";
                }else{
                    // alert(t);
                    saveInvoice(orderId,pid,mail,amount,qty);
                      // Payment completed. It can be a successful failure.
            payhere.onCompleted = function onCompleted(orderId) {
                console.log("Payment completed. OrderID:" + orderId);
        
                // saveInvoice(orderId,pid,mail,amount,qty);
                // save invoice kiyn function ekt call krddi mewa load kara gni/
                // Note: validate the payment and show success or failure page to the customer
            };
        
            // Payment window closed
            payhere.onDismissed = function onDismissed() {
                // Note: Prompt user to pay again or show an error page
                console.log("Payment dismissed");
            };
        
            // Error occurred
            payhere.onError = function onError(error) {
                // Note: show an error page
                console.log("Error:"  + error);
            };
        
            // Put the payment variables here
            var payment = {
                "sandbox": true,
                "merchant_id": "1221263",    // Replace your Merchant ID
                "return_url":"http://localhost/viwer_orchid/singleProductView.php?id" + pid,    // Important
                "cancel_url": "http://localhost/viwer_orchid/singleProductView.php?id" + pid,     // Important
                "notify_url": "http://sample.com/notify",
                "order_id": obj["id"],
                "items": obj["item"],
                "amount":amount,
                "currency": "LKR",
                "first_name": obj["fname"],
                "last_name": obj["lname"],
                "email": mail,
                "phone": obj["mobile"],
                "address": obj["address"],
                "city": obj["city"],
                "country": "Sri Lanka",
                "delivery_address": obj["address"],
                "delivery_city": obj["city"],
                "delivery_country": "Sri Lanka",
                "custom_1": "",
                "custom_2": ""
            };
        
            // Show the payhere.js popup, when "PayHere Pay" is clicked
            // document.getElementById('payhere-payment').onclick = function (e) {
                payhere.startPayment(payment);
            // };
                }
            }
        }
            r.open("GET","buyNowProcess.php?id="+pid+"&qty="+qty,true);
            r.send();

}

function payment2(id){
    alert(id);
    
}

function saveInvoice(orderId,pid,mail,amount,qty){
    alert("please take your invoice.");
        var f =  new FormData();
    
        f.append("o",orderId);
        f.append("i",pid);
        f.append("m",mail);
        f.append("a",amount);
        f.append("q",qty);
    
        var r = new XMLHttpRequest();
    
        r.onreadystatechange = function(){
            if(r.readyState == 4){
                var t =r.responseText;
                if(t =="1"){
                    window.location = "invoice.php?id="+ orderId;
                }else{
                    alert(t);
                    window.location = "invoice.php?id="+ orderId;
                }
            }
        }
        r.open("POST","saveInvoice.php",true);
        r.send(f);
    
       }

function changeImage(){
    // alert("ok");
    var view = document.getElementById("viewImg");//img tag
    var file = document.getElementById("profileAoimgc");//file chooser

    file.onchange = function () {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }

}

function updateProfile(){
 
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var province = document.getElementById("province");
    var district = document.getElementById("district");
    var city = document.getElementById("city");
    var pcode = document.getElementById("pcode");
    var image = document.getElementById("profileAoimgc");
    
    var f = new FormData();

    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("m", mobile.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);
    f.append("p", province.value);
    f.append("d", district.value);
    f.append("c", city.value);
    f.append("pc", pcode.value);
    
    if (image.files.length == 0) {
    
        var confirmation = confirm("Are you sure You don't want to update Profile Image?");
    
    
    } else {
        f.append("image", image.files[0]);
    }
    
    var r = new XMLHttpRequest();
    
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Updated");
                window.location.reload();
            } else {
                alert(t);
                
            }
        }
    };

   r.open("POST","updateProfileProcess.php",true);
   r.send(f);


}

function addToCart(pid){
    var r = new XMLHttpRequest();

    r.onreadystatechange= function(){
        if(r.readyState == 4){
            var t = r.responseText;
            alert(t);
        }
    };

    r.open("GET","addToCardProcess.php?id="+pid,true);
    r.send();

}

function advanceSearch(x){
    var search = document.getElementById("search");
    var category = document.getElementById("category");
    var items = document.getElementById("items");
    var type = document.getElementById("type");
    var color = document.getElementById("color");
    var pf = document.getElementById("pf");
    var pt = document.getElementById("pt");
    var sortby = document.getElementById("sortby");

    var f = new FormData();

    f.append("search",search.value);
    f.append("category",category.value);
    f.append("items",items.value);
    f.append("type",type.value);
    f.append("color",color.value);
    f.append("pf",pf.value);
    f.append("pt",pt.value);
    f.append("sortby",sortby.value);
    f.append("page",x);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4){
var t = r.responseText;
document.getElementById("view_area").innerHTML=t;
        }
    }
    r.open("POST","advanceSearchProcess.php",true);
    r.send(f);
}

function deletewatchlist(){
 var r = new XMLHttpRequest();
 r.onreadystatechange=function(){
    if(r.readyState==4){
        var t = r.responseText;
        document.getElementById("watchlistarea").innerHTML=t;
    }
 }
 r.open("GET","deletewatchlistProcess.php",true);
 r.send();

}

function sendid(pid){
  
// alert(pid);

var r = new XMLHttpRequest();

r.onreadystatechange = function(){
    if(r.readyState == 4){
        var t = r.responseText;
        // alert(t);
        if(t == "success"){
            window.location = "update.php";
        }else{
            alert (t);
        }

        // document.getElementById("sort").innerHTML =t;
    }
}

r.open("GET","uppotMid.php?id=" + pid,true);
r.send();
}

function updateProduct() {
    
    var updatebtn =document.getElementById("updatebtn");
    updatebtn.innerHTML="done";
    updatebtn.className="rounded-circle btn btn-success fs-5";

    // var title = document.getElementById("title").value;
    var description = document.getElementById("description").value;
    var price = document.getElementById("price").value;
    var qty = document.getElementById("qty").value;
    var del = document.getElementById("del");
    var image = document.getElementById("imageuploader");
// alert(title);
    // alert(del).value;

    var f = new FormData();

    f.append("description", description);
    f.append("price", price);
    f.append("qty", qty);
    
    
    var file_count = image.files.length;

    for (var x = 0; x < file_count; x++) {
        f.append("image" + x, image.files[x]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
       alert(t);
        }
    }

    r.open("POST", "updateProductProcess.php", true);
    r.send(f);
}

function viewProductProcess(x){ 
window.location="viewProduct.php";

 r.open("GET","viewProduct.php?page="+x,true);
 r.send(f);
}

function deleteProductsBySeller(){
    // alert("alright");
    var r = new XMLHttpRequest();
    r.onreadystatechange=function(){
       if(r.readyState==4){
           var t = r.responseText;
        if(t="success"){
            window.location.reload();
        }else{
            alert(t);
        }
       }
    }
    r.open("GET","deleteProductsBySellerProcess.php",true);
    r.send();
   
   }

function deletefromCart(pid){
    
    var r = new XMLHttpRequest();
    r.onreadystatechange=function(){
       if(r.readyState==4){
           var t = r.responseText;
       alert(t);
       window.location.reload();
       }
    }
    r.open("GET","deletefromCartProcess.php?pid="+pid,true);
    r.send();
   
   }   

function blockProduct(pid){

    var request = new XMLHttpRequest();

    request.onreadystatechange = function(){
        if(request.readyState == 4){
            var txt  = request.responseText;
            if(txt == "Activated"){
                document.getElementById("pb" + pid).innerHTML = "Deactivated";
                document.getElementById("pb" + pid).classList= "activeupdate ";
                window.location.reload();
            }else if( txt == "Dactivated"){
                document.getElementById("pb" + pid).innerHTML = "Activated";
                document.getElementById("pb" + pid).classList= "activeupdate";
                window.location.reload();
            }else{
                alert(txt);
            }
        }
    }

    request.open("GET","productBlockProcess.php?id="+pid,true);
    request.send();
}   
function index(){
    window.location ="index.php";
}

var av;
 function adminVerification(){
var email = document.getElementById("e");

var f = new FormData();
f.append("e",email.value);

var r = new XMLHttpRequest();

r.onreadystatechange = function(){
    if(r.readyState == 4){
        var t= r.responseText;
        if(t == "Success"){
            var adminVerificationModel = document.getElementById("verificationModel");
            av = new bootstrap.Modal(adminVerificationModel);
            av.show();
        }else{
        alert(t);
    }
}
};
r.open("POST","adminVerificationProcess.php",true);
r.send(f);

 }

 function verify(){
    var Verification = document.getElementById("vcode");
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == 'success'){
                av.hide();
                window.location="adminPanel.php";
            }else{
            alert(t);
        }
        }
    };
    r.open("GET","verificationProcess.php?v="+Verification.value,true);
    r.send();
 }

 var bm;
function forgotPassword() {
    // alert("ya");

    var email = document.getElementById("emails");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Verification code has sent to your email. Please check your inbox");
                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}

function showPassword1() {

    var i = document.getElementById("npi");
    var eye = document.getElementById("e1");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }

}

function showPassword2() {

    var i = document.getElementById("rnp");
    var eye = document.getElementById("e2");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }

}

function resetpw() {

    var email = document.getElementById("emails");
    var np = document.getElementById("npi");
    var rnp = document.getElementById("rnp");
    var vcode = document.getElementById("vc");

    var f = new FormData();
    f.append("e", email.value);
    f.append("n", np.value);
    f.append("r", rnp.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                bm.hide();
                alert("Password reset success");

            } else {
                alert(t);
            }

        }
    };

    r.open("POST", "resetPassword.php", true);
    r.send(f);

}
function printInvoice(){
    alert("print..")
    var body = document.body.innerHTML;
    var page = document.getElementById("page").innerHTML;
    document.body.innerHTML= page;
    window.print();
    document.body.innerHTML = body;
   }
   function qty_inc(qty){
    var input = document.getElementById("qty_input");
    if(input.value < qty){
        var newValue = parseInt(input.value) + 1;
        input.value = newValue.toString();
    }else{
        alert ("Maximum quantity has achieved");
        input.value = qty;
    }
 }
function qty_dec(){
    var input = document.getElementById("qty_input");
    if(input.value > 1){
        var newValue = parseInt(input.value) - 1;
        input.value = newValue.toString();
    }else{
        alert ("Minimum quantity has achieved");
        input.value = 1;
    }
 }
 function signout() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                window.location = "home.php";
                // window.location.reload();

            } else {
                alert(t);
            }
        }
    };

    r.open("GET", "signoutProcess.php", true);
    r.send();

}