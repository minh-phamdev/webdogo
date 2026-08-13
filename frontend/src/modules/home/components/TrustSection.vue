<template>
    <section class="trust">
        <div class="trust-container">
            <div class="trust-bar">
                <div v-for="(item, idx) in items" :key="item.label" class="trust-item">
                    <span class="icon" v-html="item.icon"></span>

                    <div class="text">
                        <strong>{{ item.label }}</strong>
                        <span>{{ item.desc }}</span>
                    </div>

                    <!-- Vạch ngăn cách chỉ hiện ở màn hình lớn -->
                    <span v-if="idx < items.length - 1" class="divider"></span>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
// Icon Line-art SVG đồng bộ màu vàng gold chuẩn thương hiệu
const items = [
    {
        label: 'Giao hàng toàn quốc',
        desc: 'Nhanh 2-5 ngày làm việc',
        icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <rect x="1" y="6" width="13" height="10" rx="1.2"/>
                <path d="M14 9h4l3 3v4h-7V9z"/>
                <circle cx="6" cy="18.5" r="1.6"/>
                <circle cx="17.5" cy="18.5" r="1.6"/>
               </svg>`
    },
    {
        label: 'Chính hãng 100%',
        desc: 'Gỗ tự nhiên, có kiểm định',
        icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 2.5l7 3v5.2c0 5-3 8.6-7 10.3-4-1.7-7-5.3-7-10.3V5.5l7-3z"/>
                <path d="M9 12l2 2 4-4.2"/>
               </svg>`
    },
    {
        label: 'Đổi trả trong 7 ngày',
        desc: 'Hoàn tiền nếu chưa hài lòng',
        icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 12a9 9 0 1 1 3 6.7"/>
                <path d="M3 21v-5h5"/>
               </svg>`
    },
    {
        label: '4.9 / 5 đánh giá',
        desc: 'Từ hơn 10.000 khách hàng',
        icon: `<svg viewBox="0 0 24 24" fill="currentColor" stroke="none">
                <path d="M12 2.5l2.9 6 6.6.9-4.8 4.6 1.2 6.5L12 17.6 6.1 20.5l1.2-6.5-4.8-4.6 6.6-.9L12 2.5z"/>
               </svg>`
    }
]
</script>

<style scoped>
/* =====================================================
   CONTAINER & SECTION
===================================================== */
.trust {
    width: 100%;
    background: var(--wd-bg, #fdfcfb);
    font-family: var(--font-body, sans-serif);
}

.trust-container {
    width: 100%;
    max-width: 1320px;
    margin: 0 auto;
    padding: 10px 20px 40px;
    box-sizing: border-box;
}

/* =====================================================
   TRUST BAR (Khối liền thanh lịch)
===================================================== */
.trust-bar {
    display: flex;
    align-items: stretch;
    background: var(--wd-surface, #fff);
    border: 1px solid var(--wd-line, #eee);
    border-radius: 14px;
    padding: 6px;
    box-shadow: var(--wd-shadow-sm, 0 2px 10px rgba(0, 0, 0, 0.03));
}

.trust-item {
    position: relative;
    flex: 1;
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 18px 20px;
    border-radius: 10px;
    transition: background 0.25s ease;
}

.trust-item:hover {
    background: rgba(212, 175, 55, 0.06);
    /* Nền ửng ánh vàng nhẹ sang trọng */
}

/* =====================================================
   ICON & TYPOGRAPHY
===================================================== */
.icon {
    flex-shrink: 0;
    width: 32px;
    height: 32px;
    color: var(--wd-gold-600, #d4af37);
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon :deep(svg) {
    width: 100%;
    height: 100%;
}

.text {
    display: flex;
    flex-direction: column;
    gap: 2px;
    min-width: 0;
}

.text strong {
    font-size: 14px;
    font-weight: 700;
    color: var(--wd-wood-900, #2c1810);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.text span {
    font-size: 12px;
    color: var(--wd-ink-soft, #777);
    line-height: 1.3;
}

/* Vạch chia giáp ranh giữa các mục */
.divider {
    position: absolute;
    right: 0;
    top: 20%;
    bottom: 20%;
    width: 1px;
    background: var(--wd-line, #eee);
}

/* =====================================================
   RESPONSIVE
===================================================== */
@media (max-width: 1024px) {
    .trust-bar {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 8px;
        padding: 12px;
    }

    .trust-item {
        padding: 14px;
        background: #fbf9f6;
        /* Nền nhẹ riêng cho từng ô khi lên tablet */
    }

    .divider {
        display: none;
        /* Ẩn vạch chia khi chuyển sang dạng lưới */
    }
}

@media (max-width: 576px) {
    .trust-container {
        padding: 10px 16px 30px;
    }

    .trust-bar {
        grid-template-columns: 1fr;
        /* Mobile hiển thị 1 cột xếp chồng */
        gap: 6px;
    }

    .trust-item {
        padding: 12px 14px;
    }

    .text strong {
        font-size: 13.5px;
    }

    .text span {
        font-size: 11.5px;
    }
}
</style>