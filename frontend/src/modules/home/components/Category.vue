<template>
    <section class="category">
        <h2 class="section-title">Danh mục sản phẩm</h2>

        <div class="category-grid">
            <div v-for="item in categories" :key="item.id" class="category-item" @click="goTo(item.slug)">
                <div class="img-wrap">
                    <img :src="item.image" :alt="item.name" loading="lazy" />
                </div>
                <p class="category-name">{{ item.name }}</p>
            </div>
        </div>
    </section>
</template>

<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()

// Đã cập nhật lại ID chuẩn (tránh trùng lặp key Vue)
const categories = [
    { id: 1, name: 'Tượng Phật', slug: 'tuong-phat', image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIhtWsOKX-blTQmXAZqInEiIvpEtltdc8CfZw1SESrNA&s=10' },
    { id: 2, name: 'Thần Tài', slug: 'than-tai', image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIhtWsOKX-blTQmXAZqInEiIvpEtltdc8CfZw1SESrNA&s=10' },
    { id: 3, name: 'Linh Vật', slug: 'linh-vat', image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIhtWsOKX-blTQmXAZqInEiIvpEtltdc8CfZw1SESrNA&s=10' },
    { id: 4, name: 'Decor Gỗ', slug: 'decor', image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIhtWsOKX-blTQmXAZqInEiIvpEtltdc8CfZw1SESrNA&s=10' },
    { id: 5, name: 'Tranh Gỗ', slug: 'tranh-go', image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIhtWsOKX-blTQmXAZqInEiIvpEtltdc8CfZw1SESrNA&s=10' },
    { id: 6, name: 'Vòng Tay', slug: 'vong-tay', image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIhtWsOKX-blTQmXAZqInEiIvpEtltdc8CfZw1SESrNA&s=10' },
    { id: 7, name: 'Khác', slug: 'khac', image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIhtWsOKX-blTQmXAZqInEiIvpEtltdc8CfZw1SESrNA&s=10' }
]

const goTo = (slug) => {
    if (!slug) return
    router.push(`/category/${slug}`)
}
</script>

<style scoped>
/* ===== CONTAINER (Gom gọn lề bằng banner trên) ===== */
.category {
    width: 100%;
    max-width: 1320px;
    margin: 0 auto;
    padding: 30px 20px;
    box-sizing: border-box;
    font-family: var(--font-body, sans-serif);
}

/* ===== TITLE ===== */
.section-title {
    position: relative;
    display: inline-block;
    margin-bottom: 24px;
    padding-bottom: 6px;
    font-family: var(--font-display, serif);
    font-size: 22px;
    font-weight: 700;
    color: var(--wd-wood-900, #2c1810);
}

.section-title::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 40px;
    height: 3px;
    background: var(--wd-gold-600, #d4af37);
    border-radius: 999px;
}

/* ===== GRID (Tự động xuống hàng nếu nhiều danh mục) ===== */
.category-grid {
    display: grid;
    /* Chia tối đa 6 cột trên màn to, tự co giãn mượt mà */
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 16px;
}

/* ===== CARD ===== */
.category-item {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    background: var(--wd-surface, #fff);
    border: 1px solid var(--wd-line, #eee);
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    box-shadow: var(--wd-shadow-sm, 0 2px 6px rgba(0, 0, 0, 0.03));
    transition: transform 0.25 ease, border-color 0.25s ease, box-shadow 0.25s ease;
}

/* ===== IMAGE WRAPPER (Sửa lỗi xén hình tượng) ===== */
.img-wrap {
    width: 100%;
    aspect-ratio: 1 / 1;
    /* Chuyển về tỷ lệ 1:1 vuông vắn */
    padding: 10px;
    box-sizing: border-box;
    background: #fbf9f6;
    display: flex;
    align-items: center;
    justify-content: center;
}

.category-item img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    /* Hiển thị trọn vẹn hình tượng, không bị cắt */
    transition: transform 0.3s ease;
}

/* ===== TEXT ===== */
.category-name {
    width: 100%;
    margin: 0;
    padding: 10px 8px;
    box-sizing: border-box;
    font-size: 14px;
    font-weight: 600;
    color: var(--wd-ink, #222);
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    transition: color 0.3s ease;
}

/* ===== HOVER EFFECTS ===== */
.category-item:hover {
    transform: translateY(-4px);
    border-color: var(--wd-gold-400, #d4af37);
    box-shadow: var(--wd-shadow-md, 0 6px 16px rgba(0, 0, 0, 0.08));
}

.category-item:hover img {
    transform: scale(1.08);
}

.category-item:hover .category-name {
    color: var(--wd-gold-600, #b8860b);
}

.category-item:active {
    transform: scale(0.97);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 1024px) {
    .category-grid {
        grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
        gap: 12px;
    }
}

@media (max-width: 600px) {
    .category {
        padding: 20px 16px;
    }

    .section-title {
        font-size: 20px;
    }

    .category-grid {
        grid-template-columns: repeat(3, 1fr);
        /* Mobile hiện 3 cột xinh xắn */
        gap: 10px;
    }

    .category-name {
        font-size: 12px;
        padding: 8px 4px;
    }
}
</style>