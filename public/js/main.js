
//CHECK TONG ORDER TRONG GIO HANG
//FILE gioHang.php
function checkOrder() {
    var inputElems = document.getElementsByClassName('checkOrder'),
        count = 0,
        total = 0;
    for (var i = 0; i < inputElems.length; i++) {
        if (inputElems[i].checked == true) {
            count++;
            total += parseInt(inputElems[i].value);
        }
    }
    var docTien = new DocTienBangChu();
    document.getElementById('tongThanhToan').innerText = "Tổng thanh toán " + count + " (SP): " + formatCash(total) + " VND " + " (" + docTien.doc(total) + " )";
    document.getElementById('ThanhToan').style.display = 'flex';

    if (total == 0) {
        document.getElementById("btnHuy").style.display = "none";
        document.getElementById('ThanhToan').style.display = 'none';
    }
    if (count > 0) {
        document.getElementById("btnThanhToan").style.display = "flex";
        document.getElementById("btnHuy").style.display = "flex";

    }
    if (count == 0) {
        document.getElementById("btnThanhToan").style.display = "none";
    }
    enableEditOrder();
    getValueChuoiTT();
}

function enableEditOrder() {
    var inputElems = document.getElementsByClassName('checkOrder');
    var inputElemsSLuong = document.getElementsByClassName('txtSoLuongOrder');
    for (var i = 0; i < inputElemsSLuong.length; i++) {
        if (inputElems[i].checked == true) {
            inputElemsSLuong[i].disabled = false;
            inputElemsSLuong[i].focus();
        } else {
            inputElemsSLuong[i].disabled = true;
        }
    }
}

//hàm chọn bỏ tất cả tích or tắt
function checkAllOrder(source) {
    checkboxes = document.getElementsByName('order');
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
    }
    checkOrder();
}
function DisplayBtnThanhToan() {
    var inputElems = document.getElementsByClassName('checkOrder'),
        count = 0;
    for (var i = 0; i < inputElems.length; i++) {
        if (inputElems[i].checked == true) {
            count++;
        }
    }
    if (count > 0) {
        document.getElementById("btnThanhToan").style.display = "flex";
        document.getElementById("btnHuy").style.display = "flex";
    }
}


function formatGiaSP() {
    const element = document.getElementsByClassName('giaSP');
    for (var i = 0; i < element.length; i++) {
        let tmp = element[i].innerHTML;
        let a = formatCash(tmp.trim());
        element[i].innerHTML = a;
    }
}
formatGiaSP();

// HÀM HỖ TRỢ

//Hàm định dạng tiền tệ VN
function formatCash(str) {
    str = new String(str);
    return str.split('').reverse().reduce((prev, next, index) => {
        return ((index % 3) ? next : (next + ',')) + prev
    })

}
//Hàm Lấy ra div cha

// tham so el la pt truyen vao , tagname la cha cần tìm
function FindParentDiv(el, tagName) {
    tagName = tagName.toLowerCase();
    while (el && el.parentNode) {
        el = el.parentNode;
        if (el.tagName && el.tagName.toLowerCase() == tagName) {
            return el;
        }
    }

    // Many DOM methods return null if they don't 
    // find the element they are searching for
    // It would be OK to omit the following and just
    // return undefined
    return null;
}


// https://github.com/nguyenthenguyen/docTienBangChu
// doc sô sâng chữ tiền việt

var DocTienBangChu = function () {
    this.ChuSo = new Array(" không ", " một ", " hai ", " ba ", " bốn ", " năm ", " sáu ", " bảy ", " tám ", " chín ");
    this.Tien = new Array("", " nghìn", " triệu", " tỷ", " nghìn tỷ", " triệu tỷ");
};

DocTienBangChu.prototype.docSo3ChuSo = function (baso) {
    var tram;
    var chuc;
    var donvi;
    var KetQua = "";
    tram = parseInt(baso / 100);
    chuc = parseInt((baso % 100) / 10);
    donvi = baso % 10;
    if (tram == 0 && chuc == 0 && donvi == 0) return "";
    if (tram != 0) {
        KetQua += this.ChuSo[tram] + " trăm ";
        if ((chuc == 0) && (donvi != 0)) KetQua += " linh ";
    }
    if ((chuc != 0) && (chuc != 1)) {
        KetQua += this.ChuSo[chuc] + " mươi";
        if ((chuc == 0) && (donvi != 0)) KetQua = KetQua + " linh ";
    }
    if (chuc == 1) KetQua += " mười ";
    switch (donvi) {
        case 1:
            if ((chuc != 0) && (chuc != 1)) {
                KetQua += " mốt ";
            }
            else {
                KetQua += this.ChuSo[donvi];
            }
            break;
        case 5:
            if (chuc == 0) {
                KetQua += this.ChuSo[donvi];
            }
            else {
                KetQua += " lăm ";
            }
            break;
        default:
            if (donvi != 0) {
                KetQua += this.ChuSo[donvi];
            }
            break;
    }
    return KetQua;
}

DocTienBangChu.prototype.doc = function (SoTien) {
    var lan = 0;
    var i = 0;
    var so = 0;
    var KetQua = "";
    var tmp = "";
    var soAm = false;
    var ViTri = new Array();
    if (SoTien < 0) soAm = true;//return "Số tiền âm !";
    if (SoTien == 0) return "Không đồng";//"Không đồng !";
    if (SoTien > 0) {
        so = SoTien;
    }
    else {
        so = -SoTien;
    }
    if (SoTien > 8999999999999999) {
        //SoTien = 0;
        return "";//"Số quá lớn!";
    }
    ViTri[5] = Math.floor(so / 1000000000000000);
    if (isNaN(ViTri[5]))
        ViTri[5] = "0";
    so = so - parseFloat(ViTri[5].toString()) * 1000000000000000;
    ViTri[4] = Math.floor(so / 1000000000000);
    if (isNaN(ViTri[4]))
        ViTri[4] = "0";
    so = so - parseFloat(ViTri[4].toString()) * 1000000000000;
    ViTri[3] = Math.floor(so / 1000000000);
    if (isNaN(ViTri[3]))
        ViTri[3] = "0";
    so = so - parseFloat(ViTri[3].toString()) * 1000000000;
    ViTri[2] = parseInt(so / 1000000);
    if (isNaN(ViTri[2]))
        ViTri[2] = "0";
    ViTri[1] = parseInt((so % 1000000) / 1000);
    if (isNaN(ViTri[1]))
        ViTri[1] = "0";
    ViTri[0] = parseInt(so % 1000);
    if (isNaN(ViTri[0]))
        ViTri[0] = "0";
    if (ViTri[5] > 0) {
        lan = 5;
    }
    else if (ViTri[4] > 0) {
        lan = 4;
    }
    else if (ViTri[3] > 0) {
        lan = 3;
    }
    else if (ViTri[2] > 0) {
        lan = 2;
    }
    else if (ViTri[1] > 0) {
        lan = 1;
    }
    else {
        lan = 0;
    }
    for (i = lan; i >= 0; i--) {
        tmp = this.docSo3ChuSo(ViTri[i]);
        KetQua += tmp;
        if (ViTri[i] > 0) KetQua += this.Tien[i];
        if ((i > 0) && (tmp.length > 0)) KetQua += '';//',';//&& (!string.IsNullOrEmpty(tmp))
    }
    if (KetQua.substring(KetQua.length - 1) == ',') {
        KetQua = KetQua.substring(0, KetQua.length - 1);
    }
    KetQua = KetQua.substring(1, 2).toUpperCase() + KetQua.substring(2);
    if (soAm) {
        return "Âm " + KetQua + " đồng";//.substring(0, 1);//.toUpperCase();// + KetQua.substring(1);
    }
    else {
        return KetQua + " đồng";//.substring(0, 1);//.toUpperCase();// + KetQua.substring(1);
    }
}