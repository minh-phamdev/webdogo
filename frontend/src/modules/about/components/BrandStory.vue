<template>
    <section class="brand-story-section">
        <div class="container-1320 grid-2">
            <!-- Cột trái: Hình ảnh xưởng & Badge làng nghề -->
            <div class="story-img-wrapper">
                <img src="https://images.unsplash.com/photo-1544816155-12df9643f363?w=800&auto=format&fit=crop&q=80"
                    alt="Xưởng chế tác Đồ Gỗ Anh Khoa" class="bo-rounded shadow" />
                <div class="experience-badge bo-rounded">
                    <span class="number">25+</span>
                    <span class="text">Năm Làng Nghề</span>
                </div>
            </div>

            <!-- Cột phải: Nội dung câu chuyện & Cam kết -->
            <div class="story-content">
                <span class="sub-title">CÂU CHUYỆN THƯƠNG HIỆU</span>
                <h2 class="serif section-title">Gìn giữ nét chạm khắc thủ công truyền thống</h2>
                <div class="gold-divider-left"></div>

                <p class="desc">
                    Khởi nguồn từ làng nghề chạm khắc gỗ lâu đời, <strong>Đồ Gỗ Anh Khoa</strong> mang sứ mệnh đưa những
                    tác phẩm <strong>tượng gỗ phong thủy độc bản</strong> và nội thất gỗ quý cao cấp đến không gian sống
                    của gia chủ Việt trên toàn quốc.
                </p>
                <p class="desc">
                    Mỗi khối gỗ Nu, gỗ Hương Gia Lai hay gỗ Mun Sừng đều được tuyển chọn kỹ lưỡng từ phôi gỗ thô, trải
                    qua hàng trăm giờ đục đẽo tỉ mỉ dưới bàn tay tài hoa của các nghệ nhân lão luyện để thổi "thần khí"
                    vào từng đường nét.
                </p>

                <!-- Danh sách cam kết chất lượng -->
                <div class="commit-list">
                    <div class="commit-item">
                        <span class="icon">✨</span>
                        <span>100% Gỗ thật, nguyên khối, không pha gỗ rác</span>
                    </div>
                    <div class="commit-item">
                        <span class="icon">🔍</span>
                        <span>Chế tác đục tay thủ công tinh xảo từng diện mặt</span>
                    </div>
                    <div class="commit-item">
                        <span class="icon">🛡️</span>
                        <span>Bảo hành mối mọt & nứt nẻ phôi gỗ trọn đời</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
// Component tĩnh hiển thị câu chuyện thương hiệu
</script>

<style scoped>
.serif {
    font-family: 'Playfair Display', Georgia, serif;
}

.bo-rounded {
    border-radius: 12px;
}

.shadow {
    box-shadow: 0 6px 20px rgba(44, 24, 16, 0.06);
}

.brand-story-section {
    padding: 40px 0;
    background: #faf8f5;
}

.container-1320 {
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 20px;
}

.grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 48px;
    align-items: center;
}

/* Image Wrapper & Badge */
.story-img-wrapper {
    position: relative;
}

.story-img-wrapper img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border: 1px solid #e8dfd5;
}

.experience-badge {
    position: absolute;
    bottom: -20px;
    right: -20px;
    background: #2c1810;
    color: #e6c675;
    padding: 16px 24px;
    border: 2px solid #c59b27;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
}

.experience-badge .number {
    font-size: 28px;
    font-weight: 800;
    display: block;
    line-height: 1;
}

.experience-badge .text {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-top: 4px;
    display: block;
}

/* Content */
.sub-title {
    font-size: 12px;
    letter-spacing: 1.5px;
    color: #c59b27;
    font-weight: 700;
    display: block;
}

.section-title {
    font-size: 26px;
    color: #2c1810;
    margin: 8px 0;
    font-weight: 700;
    line-height: 1.3;
}

.gold-divider-left {
    width: 50px;
    height: 3px;
    background: #c59b27;
    margin-bottom: 20px;
    border-radius: 2px;
}

.desc {
    color: #554438;
    font-size: 14px;
    line-height: 1.7;
    margin-bottom: 14px;
}

/* Commitments */
.commit-list {
    margin-top: 24px;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.commit-item {
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 600;
    font-size: 14px;
    color: #2c1810;
}

.commit-item .icon {
    font-size: 16px;
    background: #f2eae0;
    padding: 6px;
    border-radius: 50%;
    line-height: 1;
}

@media (max-width: 850px) {
    .grid-2 {
        grid-template-columns: 1fr;
        gap: 32px;
    }

    .experience-badge {
        bottom: 10px;
        right: 10px;
    }
}
</style>