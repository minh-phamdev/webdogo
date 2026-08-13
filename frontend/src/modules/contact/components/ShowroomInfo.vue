<template>
    <div class="showroom-info-wrapper">
        <!-- Thẻ Showroom Trưng Bày -->
        <div class="info-card bo-rounded shadow">
            <div class="card-header">
                <span class="icon">🏛️</span>
                <h4 class="serif info-heading">Showroom Trưng Bày</h4>
            </div>
            <div class="card-body">
                <p class="info-item">
                    <strong>Địa chỉ:</strong> 123 Nguyễn Trãi, Q. Thanh Xuân, Hà Nội
                </p>
                <p class="info-item">
                    <strong>Giờ mở cửa:</strong> 08:00 - 21:00 (Tất cả các ngày trong tuần)
                </p>
                <p class="info-item">
                    <strong>Trải nghiệm:</strong> Xem mẫu có sẵn, tư vấn phong thủy trực tiếp.
                </p>
            </div>
        </div>

        <!-- Thẻ Xưởng Chế Tác -->
        <div class="info-card bo-rounded shadow">
            <div class="card-header">
                <span class="icon">🪵</span>
                <h4 class="serif info-heading">Xưởng Chế Tác Trực Tiếp</h4>
            </div>
            <div class="card-body">
                <p class="info-item">
                    <strong>Địa chỉ:</strong> Làng nghề Đồ Gỗ Mỹ Nghệ, Hoài Đức, Hà Nội
                </p>
                <p class="info-item">
                    <strong>Hotline / Zalo:</strong> <span class="highlight">0901 234 567</span>
                </p>
                <p class="info-item">
                    <strong>Email:</strong> support@dogoanhkhoa.vn
                </p>
            </div>
        </div>

        <!-- Nút hành động nhanh -->
        <div class="quick-actions">
            <a href="https://zalo.me" target="_blank" class="btn-action zalo">💬 Chat Zalo Tư Vấn</a>
            <a href="tel:0901234567" class="btn-action call">📞 Gọi Hotline Ngay</a>
        </div>
    </div>
</template>

<style scoped>
.serif {
    font-family: 'Playfair Display', Georgia, serif;
}

.bo-rounded {
    border-radius: 12px;
}

.shadow {
    box-shadow: 0 4px 15px rgba(44, 24, 16, 0.03);
}

.showroom-info-wrapper {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.info-card {
    background: #ffffff;
    border: 1px solid #e8dfd5;
    padding: 20px;
}

.card-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 12px;
}

.card-header .icon {
    font-size: 20px;
}

.info-heading {
    font-size: 17px;
    color: #a32219;
    margin: 0;
    font-weight: 700;
}

.card-body {
    font-size: 13px;
    color: #554438;
    line-height: 1.6;
}

.info-item {
    margin: 0 0 8px 0;
}

.info-item:last-child {
    margin-bottom: 0;
}

.info-item strong {
    color: #2c1810;
}

.highlight {
    color: #a32219;
    font-weight: 700;
    font-size: 15px;
}

.quick-actions {
    display: flex;
    gap: 12px;
    margin-top: 4px;
}

.btn-action {
    flex: 1;
    text-align: center;
    padding: 12px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
    color: #ffffff;
    transition: opacity 0.2s;
}

.btn-action:hover {
    opacity: 0.9;
}

.btn-action.zalo {
    background: #0068ff;
}

.btn-action.call {
    background: #a32219;
}
</style>