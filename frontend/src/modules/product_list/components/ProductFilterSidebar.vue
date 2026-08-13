<template>
    <aside class="filter-sidebar bo-rounded">
        <div class="sidebar-header">
            <h3 class="title serif">Bộ lọc sản phẩm</h3>
            <button @click="resetFilters" class="btn-reset">Xóa lọc</button>
        </div>
        <div class="header-line"></div>

        <!-- 1. Danh mục -->
        <div class="filter-group">
            <h4 class="group-title serif">Danh mục sản phẩm</h4>
            <div v-for="cat in categories" :key="cat.id" class="checkbox-item">
                <input type="checkbox" :id="`cat-${cat.id}`" :value="cat.id" v-model="filters.categories" />
                <label :for="`cat-${cat.id}`">{{ cat.name }} <span class="count">({{ cat.count }})</span></label>
            </div>
        </div>

        <div class="divider"></div>

        <!-- 2. Loại gỗ -->
        <div class="filter-group">
            <h4 class="group-title serif">Chất liệu gỗ quý</h4>
            <div v-for="wood in woodTypes" :key="wood.id" class="checkbox-item">
                <input type="checkbox" :id="`wood-${wood.id}`" :value="wood.id" v-model="filters.woods" />
                <label :for="`wood-${wood.id}`">{{ wood.name }}</label>
            </div>
        </div>

        <div class="divider"></div>

        <!-- 3. Mệnh Phong thủy -->
        <div class="filter-group">
            <h4 class="group-title serif">Hợp Mệnh Phong Thủy</h4>
            <div class="element-grid">
                <button v-for="elem in elements" :key="elem.value" type="button" class="element-btn"
                    :class="{ active: filters.element === elem.value }" @click="selectElement(elem.value)">
                    {{ elem.label }}
                </button>
            </div>
        </div>
    </aside>
</template>

<script setup>
import { ref, watch } from 'vue'

const emit = defineEmits(['filter-change'])

const categories = [
    { id: 'tuong-phat', name: 'Tượng Phật - Di Lặc', count: 18 },
    { id: 'tuong-linh-vat', name: 'Linh Vật Phong Thủy', count: 12 },
    { id: 'luc-binh', name: 'Lục Bình Nguyên Khối', count: 8 },
    { id: 'khay-tra', name: 'Khay Trà & Decor', count: 15 }
]

const woodTypes = [
    { id: 'go-huong', name: 'Gỗ Hương Gia Lai' },
    { id: 'go-mun', name: 'Gỗ Mun Sừng Khánh Hòa' },
    { id: 'go-cam', name: 'Gỗ Cẩm Lai' },
    { id: 'go-trac', name: 'Gỗ Trắc Đỏ Đen' }
]

const elements = [
    { label: 'Kim', value: 'kim' },
    { label: 'Mộc', value: 'moc' },
    { label: 'Thủy', value: 'thuy' },
    { label: 'Hỏa', value: 'hoa' },
    { label: 'Thổ', value: 'tho' }
]

const filters = ref({
    categories: [],
    woods: [],
    element: ''
})

const selectElement = (val) => {
    filters.value.element = filters.value.element === val ? '' : val
}

const resetFilters = () => {
    filters.value = { categories: [], woods: [], element: '' }
}

watch(filters, (newVal) => {
    emit('filter-change', newVal)
}, { deep: true })
</script>

<style scoped>
.filter-sidebar {
    background: #ffffff;
    border: 1px solid #e8dfd5;
    padding: 22px;
    box-shadow: 0 4px 15px rgba(44, 24, 16, 0.03);
}

.bo-rounded {
    border-radius: 12px;
}

.serif {
    font-family: 'Playfair Display', 'Merriweather', Georgia, serif;
}

.sidebar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.title {
    font-size: 18px;
    color: #2c1810;
    margin: 0;
    font-weight: 700;
}

.btn-reset {
    background: none;
    border: none;
    color: #c59b27;
    font-size: 13px;
    cursor: pointer;
    text-decoration: underline;
    font-weight: 500;
}

.header-line {
    width: 40px;
    height: 3px;
    background: #c59b27;
    margin: 10px 0 18px 0;
    border-radius: 2px;
}

.filter-group {
    margin-bottom: 16px;
}

.group-title {
    font-size: 15px;
    color: #2c1810;
    margin-bottom: 12px;
    font-weight: 600;
}

.checkbox-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
    color: #4a3b32;
    margin-bottom: 10px;
    cursor: pointer;
}

.checkbox-item input[type="checkbox"] {
    accent-color: #2c1810;
    width: 15px;
    height: 15px;
    cursor: pointer;
}

.count {
    color: #8c7a6b;
    font-size: 12px;
}

.divider {
    height: 1px;
    background: #f2eae0;
    margin: 18px 0;
}

.element-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 8px;
}

.element-btn {
    padding: 8px 0;
    border: 1px solid #e8dfd5;
    background: #faf8f5;
    color: #2c1810;
    border-radius: 6px;
    font-size: 13px;
    cursor: pointer;
    text-align: center;
    font-weight: 500;
    transition: all 0.2s;
}

.element-btn:hover {
    border-color: #c59b27;
    color: #c59b27;
}

.element-btn.active {
    background: #2c1810;
    color: #e6c675;
    border-color: #2c1810;
    font-weight: 600;
}
</style>