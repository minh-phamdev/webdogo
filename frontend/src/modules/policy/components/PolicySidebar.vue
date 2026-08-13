<template>
    <aside class="policy-sidebar bo-rounded shadow">
        <h3 class="serif sidebar-title">Danh Mục Chính Sách</h3>
        <div class="gold-line"></div>

        <nav class="policy-menu">
            <router-link to="/chinh-sach-bao-hanh" class="menu-item">
                <span class="icon">🛡️</span> Bảo hành & Bảo trì
            </router-link>
            <router-link to="/chinh-sach-van-chuyen" class="menu-item">
                <span class="icon">🚚</span> Vận chuyển & Lắp đặt
            </router-link>
            <router-link to="/chinh-sach-doi-tra" class="menu-item">
                <span class="icon">🔄</span> Đổi trả & Hoàn tiền
            </router-link>
        </nav>

        <!-- Box hỗ trợ nhanh -->
        <div class="support-box bo-rounded">
            <div class="support-icon">📞</div>
            <h4>Cần Hỗ Trợ Gấp?</h4>
            <p>Liên hệ trực tiếp Quản lý xưởng để được giải quyết nhanh nhất</p>
            <a href="tel:0901234567" class="hotline-btn">0901 234 567</a>
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

.policy-sidebar {
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

.policy-menu {
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

/* Support Box */
.support-box {
    background: #faf4eb;
    border: 1px dashed #c59b27;
    padding: 18px;
    text-align: center;
}

.support-icon {
    font-size: 28px;
    margin-bottom: 6px;
}

.support-box h4 {
    font-size: 15px;
    color: #2c1810;
    margin: 0 0 6px;
    font-weight: 700;
}

.support-box p {
    font-size: 12px;
    color: #665548;
    line-height: 1.4;
    margin-bottom: 12px;
}

.hotline-btn {
    display: inline-block;
    background: #a32219;
    color: #ffffff;
    font-weight: 700;
    font-size: 15px;
    padding: 10px 18px;
    border-radius: 6px;
    text-decoration: none;
    width: 100%;
    box-sizing: border-box;
    transition: opacity 0.2s;
}

.hotline-btn:hover {
    opacity: 0.9;
}
</style>