<template>
    <a-layout-footer class="footer">
        <div class="footer-container">
            <!-- Cột 1: Thông tin thương hiệu -->
            <div class="footer-col brand-col">
                <h3>ĐỒ GỖ ANH KHOA</h3>
                <p class="tagline">Chuyên cung cấp tượng gỗ phong thủy cao cấp, chế tác thủ công từ gỗ quý.</p>

                <p><strong>MST:</strong> 0123456789</p>
                <p><strong>Địa chỉ:</strong> Đa Sỹ, Thường Tín, Hà Nội, Việt Nam</p>
                <p><strong>Email:</strong> support@dogoanhkhoa.vn</p>
                <p><strong>Hotline:</strong> 0901 234 567</p>
            </div>

            <!-- Cột 2: Các trang Chính sách -->
            <div class="footer-col">
                <h4>Chính sách</h4>
                <ul>
                    <li><router-link to="/dieu-khoan-su-dung">Điều khoản sử dụng</router-link></li>
                    <li><router-link to="/chinh-sach-van-chuyen">Chính sách vận chuyển</router-link></li>
                    <li><router-link to="/chinh-sach-doi-tra">Chính sách đổi trả</router-link></li>
                    <li><router-link to="/chinh-sach-bao-hanh">Chính sách bảo hành</router-link></li>
                </ul>
            </div>

            <!-- Cột 3: Trung tâm Hỗ trợ -->
            <div class="footer-col">
                <h4>Hỗ trợ</h4>
                <ul>
                    <li><router-link to="/contact">Liên hệ & Showroom</router-link></li>
                    <li><router-link to="/cau-hoi-thuong-gap">Câu hỏi thường gặp</router-link></li>
                    <li><router-link to="/huong-dan-mua-hang">Hướng dẫn mua hàng</router-link></li>
                    <li><router-link to="/order-tracking">Tra cứu đơn hàng</router-link></li>
                </ul>
            </div>

            <!-- Cột 4: Chứng nhận BCT -->
            <div class="footer-col">
                <h4>Chứng nhận</h4>
                <a href="http://online.gov.vn/Home/WebDetails/XXXXX" target="_blank" rel="noopener noreferrer">
                    <img src="https://zozo.vn/upload/public/Traht%20-%2013-3-2023/Website/thong-bao-website-voi-bo-cong-thuong.png"
                        alt="Bộ Công Thương" class="bct-logo" />
                </a>
                <p class="bct-note">Website đã đăng ký với Bộ Công Thương</p>
            </div>

            <!-- Cột 5: Bản đồ Showroom / Xưởng -->
            <div class="footer-col map-col">
                <h4>Bản đồ Xưởng gỗ</h4>
                <div class="map-wrapper">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d4422.619718724964!2d105.8230174752519!3d20.85594188075055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjDCsDUxJzIxLjQiTiAxMDXCsDQ5JzMyLjEiRQ!5e1!3m2!1svi!2s!4v1786594802940!5m2!1svi!2s"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="strict-origin-when-cross-origin"></iframe>
                </div>
            </div>
        </div>

        <!-- Bản quyền dưới chân -->
        <div class="footer-bottom">
            © 2026 ĐỒ GỖ ANH KHOA. All rights reserved.
        </div>
    </a-layout-footer>
</template>

<script setup>
</script>

<style scoped>
.footer {
    /* Nâu gỗ đậm ánh vân gỗ */
    background: linear-gradient(180deg, var(--wd-wood-900, #3B2314) 0%, #2A190D 100%);
    color: #E7DBC8;
    padding: 48px 40px 20px;
    font-family: var(--font-body, inherit);
}

.footer-container {
    display: grid;
    grid-template-columns: 1.2fr 0.8fr 0.8fr 0.8fr 1.2fr;
    gap: 30px;
}

.footer-col h3 {
    font-family: var(--font-display, 'Playfair Display', Georgia, serif);
    font-size: 20px;
    letter-spacing: .5px;
    margin-bottom: 12px;
    color: var(--wd-gold-400, #C59B27);
    font-weight: 700;
}

.footer-col h4 {
    margin-bottom: 14px;
    color: #F4EBDA;
    font-size: 15px;
    font-weight: 600;
}

.footer-col p {
    font-size: 13px;
    line-height: 1.6;
    color: #C9B79E;
    margin-bottom: 6px;
}

.tagline {
    margin-bottom: 14px;
    color: #D9C7AC;
}

.footer-col ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-col li {
    margin-bottom: 9px;
}

.footer-col a {
    color: #C9B79E;
    text-decoration: none;
    font-size: 13px;
    transition: color .2s ease;
    display: inline-block;
}

.footer-col a:hover,
.footer-col a.router-link-active {
    color: var(--wd-gold-400, #C59B27);
}

.bct-logo {
    width: 130px;
    margin-top: 6px;
    background: #fff;
    padding: 4px;
    border-radius: 4px;
    display: block;
}

.bct-note {
    font-size: 12px;
    margin-top: 8px;
    color: #A6937A;
}

/* Kiểu dáng cho khung chứa Bản đồ Google Maps */
.map-wrapper {
    width: 100%;
    height: 150px;
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid rgba(197, 155, 39, 0.3);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.google-map {
    width: 100%;
    height: 100%;
    border: 0;
}

.footer-bottom {
    text-align: center;
    margin-top: 36px;
    padding-top: 16px;
    border-top: 1px solid rgba(217, 164, 65, .15);
    font-size: 13px;
    color: #A6937A;
}

@media (max-width: 1024px) {
    .footer-container {
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }
}

@media (max-width: 600px) {
    .footer {
        padding: 32px 20px 20px;
    }

    .footer-container {
        grid-template-columns: 1fr;
        gap: 24px;
    }
}
</style>