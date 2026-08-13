<template>
    <div class="map-wrapper">
        <div class="text-center section-head">
            <h3 class="serif section-title">Bản Đồ Chỉ Đường Đến Showroom</h3>
            <div class="gold-divider"></div>
        </div>

        <!-- Đã thêm class map-frame và bo-rounded vào iframe -->
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d4422.619718724964!2d105.8230174752519!3d20.85594188075055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjDCsDUxJzIxLjQiTiAxMDXCsDQ5JzMyLjEiRQ!5e1!3m2!1svi!2s!4v1786595164277!5m2!1svi!2s"
            class="map-frame bo-rounded" loading="lazy" referrerpolicy="strict-origin-when-cross-origin">
        </iframe>
    </div>
</template>

<style scoped>
.serif {
    font-family: 'Playfair Display', Georgia, serif;
}

.text-center {
    text-align: center;
}

.map-wrapper {
    margin-top: 40px;
}

.section-title {
    font-size: 20px;
    color: #2c1810;
    margin: 0;
    font-weight: 700;
}

.gold-divider {
    width: 50px;
    height: 3px;
    background: #c59b27;
    margin: 8px auto 20px;
    border-radius: 2px;
}

/* Bo góc cho iframe (cần overflow: hidden để các trình duyệt cắt góc mượt) */
.bo-rounded {
    border-radius: 12px;
    overflow: hidden;
}

.map-frame {
    width: 100%;
    height: 380px;
    border: 1px solid #e8dfd5;
    box-shadow: 0 4px 15px rgba(44, 24, 16, 0.08);
    display: block;
    transition: all 0.3s ease;
}

/* Hiệu ứng viền vàng nhẹ khi di chuột vào bản đồ */
.map-frame:hover {
    border-color: #c59b27;
    box-shadow: 0 6px 20px rgba(197, 155, 39, 0.18);
}

/* Tối ưu hiển thị cho thiết bị di động */
@media (max-width: 768px) {
    .map-frame {
        height: 280px;
    }
}
</style>