<template>
    <section class="description-tabs-section">
        <div class="tabs-container">
            <!-- Khối Card chứa toàn bộ Tabs -->
            <div class="tabs-card bo-rounded">

                <!-- Thanh Nav Tabs -->
                <div class="tabs-header">
                    <button v-for="tab in tabs" :key="tab.id" :class="['tab-btn', { active: activeTab === tab.id }]"
                        @click="activeTab = tab.id">
                        {{ tab.label }}
                    </button>
                </div>

                <!-- Nội dung của từng Tab -->
                <div class="tab-body">
                    <!-- Tab 1: Mô tả -->
                    <div v-if="activeTab === 'desc'" class="tab-panel">
                        <h3 class="panel-title">Mô tả sản phẩm</h3>
                        <p>
                            Tượng Phật Di Lặc Gỗ Hương Nguyên Khối được chế tác thủ công bởi các nghệ nhân giàu kinh
                            nghiệm.
                            Tác phẩm thể hiện hình tượng Đức Phật Di Lặc với nụ cười hoan hỷ, ngự trên đế gỗ tự nhiên,
                            mang lại năng lượng tích cực và sự an lạc cho gia chủ.
                        </p>
                        <p>
                            Chất gỗ hương cao cấp với đường vân tự nhiên sắc nét, độ bền vượt thời gian, không mối mọt
                            hay cong vênh trong quá trình sử dụng.
                        </p>
                    </div>

                    <!-- Tab 2: Ý nghĩa phong thủy -->
                    <div v-if="activeTab === 'fengshui'" class="tab-panel">
                        <h3 class="panel-title">Ý nghĩa phong thủy</h3>
                        <p>
                            Trong phong thủy, Phật Di Lặc là biểu tượng tuyệt đối của hạnh phúc, sự hoan hỷ và may mắn.
                            Nụ cười của Đức Phật có khả năng xua tan mọi lo âu, phiền muộn, mang đến sự bình an cho mọi
                            thành viên trong gia đình.
                        </p>
                        <ul class="fengshui-list">
                            <li><strong>Chiêu tài tiến bảo:</strong> Hình tượng Phật cầm thỏi vàng hoặc bao tải tiền
                                tượng trưng cho tài lộc dồi dào.</li>
                            <li><strong>Hòa hợp gia đạo:</strong> Năng lượng từ gỗ hương tự nhiên kết hợp với diện tượng
                                hoan hỷ giúp gia đình luôn hòa thuận.</li>
                        </ul>
                    </div>

                    <!-- Tab 3: Cách trưng bày -->
                    <div v-if="activeTab === 'display'" class="tab-panel">
                        <h3 class="panel-title">Hướng dẫn trưng bày chuẩn phong thủy</h3>
                        <p>Để tượng Phật phát huy tối đa năng lượng phong thủy tốt lành, gia chủ nên lưu ý các vị trí
                            sau:</p>
                        <ul>
                            <li><strong>Đặt tại phòng khách:</strong> Đối diện cửa chính, hướng nhìn ra ngoài để nghênh
                                đón tài lộc.</li>
                            <li><strong>Đặt trên bàn làm việc:</strong> Giúp tinh thần minh mẫn, giảm căng thẳng và mở
                                rộng con đường công danh.</li>
                            <li><strong>Độ cao lý tưởng:</strong> Nên đặt tượng ở vị trí cao từ 1m trở lên, tránh đặt
                                trực tiếp xuống sàn nhà.</li>
                        </ul>
                    </div>

                    <!-- Tab 4: Thông số kỹ thuật -->
                    <div v-if="activeTab === 'specs'" class="tab-panel">
                        <h3 class="panel-title">Thông số kỹ thuật</h3>
                        <table class="specs-table">
                            <tbody>
                                <tr>
                                    <td>Chất liệu</td>
                                    <td>Gỗ Hương đỏ Việt Nam (Nguyên khối 100%)</td>
                                </tr>
                                <tr>
                                    <td>Kích thước</td>
                                    <td>Cao 50cm x Rộng 45cm x Sâu 30cm</td>
                                </tr>
                                <tr>
                                    <td>Trọng lượng</td>
                                    <td>Khoảng 18.5 kg</td>
                                </tr>
                                <tr>
                                    <td>Màu sắc</td>
                                    <td>Màu gỗ hương tự nhiên, phun sơn PU bóng mờ cao cấp</td>
                                </tr>
                                <tr>
                                    <td>Xuất xứ</td>
                                    <td>Làng nghề mỹ nghệ truyền thống</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Tab 5: Đánh giá -->
                    <div v-if="activeTab === 'reviews'" class="tab-panel">
                        <h3 class="panel-title">Đánh giá từ khách hàng (4.9/5 ⭐)</h3>
                        <div class="review-item">
                            <div class="review-header">
                                <strong>Nguyễn Văn A</strong>
                                <span class="stars">⭐⭐⭐⭐⭐</span>
                            </div>
                            <p class="review-text">Tượng ở ngoài đẹp hơn trong ảnh nhiều, đục rất có thần và đường vân
                                gỗ cực nét. Đóng gói rất cẩn thận!</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue'

const activeTab = ref('desc')

const tabs = [
    { id: 'desc', label: 'Mô tả' },
    { id: 'fengshui', label: 'Ý nghĩa phong thủy' },
    { id: 'display', label: 'Cách trưng bày' },
    { id: 'specs', label: 'Thông số kỹ thuật' },
    { id: 'reviews', label: 'Đánh giá' }
]
</script>

<style scoped>
.description-tabs-section {
    width: 100%;
    padding: 20px 0;
    box-sizing: border-box;
}

/* Gom khung 1320px căn giữa đồng bộ toàn trang */
.tabs-container {
    width: 100%;
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 20px;
    box-sizing: border-box;
}

/* Thẻ Card bao bọc toàn bộ phần Tabs */
.tabs-card {
    background: #ffffff;
    border: 1px solid var(--wd-line, #e8e2d9);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
}

/* Thanh điều hướng Tab */
.tabs-header {
    display: flex;
    align-items: center;
    gap: 8px;
    background-color: #fcfbfa;
    border-bottom: 1px solid var(--wd-line, #e8e2d9);
    padding: 0 16px;
    overflow-x: auto;
    /* Cho phép cuộn ngang trên điện thoại */
}

.tab-btn {
    background: transparent;
    border: none;
    outline: none;
    padding: 16px 20px;
    font-family: inherit;
    font-size: 15px;
    font-weight: 600;
    color: #666;
    cursor: pointer;
    position: relative;
    white-space: nowrap;
    transition: color 0.2s ease;
}

.tab-btn:hover {
    color: var(--wd-wood-900, #2c1810);
}

/* Tab đang được chọn */
.tab-btn.active {
    color: var(--wd-wood-900, #2c1810);
    font-weight: 700;
}

.tab-btn.active::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background-color: var(--wd-gold-600, #d4af37);
    border-radius: 3px 3px 0 0;
}

/* Khối nội dung */
.tab-body {
    padding: 32px;
    color: #333;
    line-height: 1.7;
    font-size: 15px;
}

.panel-title {
    font-family: serif;
    font-size: 20px;
    font-weight: 700;
    color: var(--wd-wood-900, #2c1810);
    margin-top: 0;
    margin-bottom: 16px;
}

.tab-panel p {
    margin-bottom: 12px;
}

.tab-panel ul {
    padding-left: 20px;
    margin-bottom: 16px;
}

.tab-panel li {
    margin-bottom: 8px;
}

/* Bảng thông số kỹ thuật */
.specs-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.specs-table tr:nth-child(odd) {
    background-color: #fbf9f6;
}

.specs-table td {
    padding: 12px 16px;
    border: 1px solid #eee;
}

.specs-table td:first-child {
    font-weight: 600;
    width: 250px;
    color: var(--wd-wood-900, #2c1810);
}

/* Đánh giá */
.review-item {
    border-bottom: 1px dashed #eee;
    padding-bottom: 12px;
    margin-bottom: 12px;
}

.review-header {
    display: flex;
    gap: 12px;
    align-items: center;
    margin-bottom: 6px;
}

/* Responsive cho Mobile */
@media (max-width: 768px) {
    .tab-body {
        padding: 20px;
    }

    .tab-btn {
        padding: 12px 14px;
        font-size: 14px;
    }

    .specs-table td:first-child {
        width: 130px;
    }
}
</style>