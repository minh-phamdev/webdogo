<template>
    <aside class="support-sidebar bo-rounded shadow">
        <h3 class="serif sidebar-title">Trung Tâm Hỗ Trợ</h3>
        <div class="gold-line"></div>

        <nav class="support-menu">
            <router-link to="/huong-dan-mua-hang" class="menu-item">
                <span class="icon">🛒</span> Hướng dẫn đặt hàng
            </router-link>
            <router-link to="/cau-hoi-thuong-gap" class="menu-item">
                <span class="icon">❓</span> Câu hỏi thường gặp (FAQ)
            </router-link>
            <router-link to="/contact" class="menu-item">
                <span class="icon">📍</span> Liên hệ Showroom / Xưởng
            </router-link>
        </nav>

        <div class="zalo-box bo-rounded">
            <h4>Gửi Ảnh Tượng / Yêu Cầu</h4>
            <p>Nhận tư vấn phong thủy và báo giá đục tượng theo kích thước riêng qua Zalo</p>
            <a href="https://zalo.me/0901234567" target="_blank" class="zalo-btn">💬 Chat Zalo Với Nghệ Nhân</a>
        </div>
    </aside>
</template>

<style scoped>
.serif {
    font-family: 'Playfair Display', Georgia, serif;
}

.bo-rounded {
    border-radius: 12px;
}

.shadow {
    box-shadow: 0 4px 15px rgba(44, 24, 16, 0.04);
}

.support-sidebar {
    background: #ffffff;
    border: 1px solid #e8dfd5;
    padding: 24px;
}

.sidebar-title {
    font-size: 18px;
    color: #2c1810;
    margin: 0 0 8px 0;
    font-weight: 700;
}

.gold-line {
    width: 40px;
    height: 3px;
    background: #c59b27;
    margin-bottom: 20px;
    border-radius: 2px;
}

.support-menu {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-bottom: 24px;
}

.menu-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 14px;
    border-radius: 8px;
    color: #554438;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.2s ease;
    background: #fcfbfa;
    border: 1px solid transparent;
}

.menu-item:hover {
    background: #f5ede4;
    color: #a32219;
}

.menu-item.router-link-exact-active {
    background: #2c1810;
    color: #e6c675;
    border-color: #c59b27;
}

.zalo-box {
    background: #f0f7ff;
    border: 1px dashed #0068ff;
    padding: 18px;
    text-align: center;
}

.zalo-box h4 {
    font-size: 15px;
    color: #0068ff;
    margin: 0 0 6px;
    font-weight: 700;
}

.zalo-box p {
    font-size: 12px;
    color: #554438;
    line-height: 1.4;
    margin-bottom: 12px;
}

.zalo-btn {
    display: inline-block;
    background: #0068ff;
    color: #ffffff;
    font-weight: 700;
    font-size: 13px;
    padding: 10px 14px;
    border-radius: 6px;
    text-decoration: none;
    width: 100%;
    box-sizing: border-box;
}
</style>