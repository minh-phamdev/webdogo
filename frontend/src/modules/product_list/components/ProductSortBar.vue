<template>
    <div class="sort-bar bo-rounded">
        <div class="result-count">
            Hiển thị <strong class="wood-color">{{ totalItems }}</strong> sản phẩm đồ gỗ chế tác
        </div>

        <div class="sort-action">
            <label for="sort-select">Sắp xếp theo:</label>
            <select id="sort-select" v-model="selectedSort" @change="onSortChange">
                <option value="newest">Mới nhất</option>
                <option value="price-asc">Giá: Thấp đến Cao</option>
                <option value="price-desc">Giá: Cao đến Thấp</option>
                <option value="popular">Bán chạy nhất</option>
            </select>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'

defineProps({
    totalItems: { type: Number, default: 0 }
})

const emit = defineEmits(['sort-change'])
const selectedSort = ref('newest')

const onSortChange = () => {
    emit('sort-change', selectedSort.value)
}
</script>

<style scoped>
.sort-bar {
    background: #ffffff;
    border: 1px solid #e8dfd5;
    padding: 14px 22px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    box-shadow: 0 4px 15px rgba(44, 24, 16, 0.03);
}

.bo-rounded {
    border-radius: 12px;
}

.result-count {
    font-size: 14px;
    color: #554438;
}

.wood-color {
    color: #2c1810;
    font-size: 15px;
}

.sort-action {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
    color: #2c1810;
}

select {
    padding: 7px 14px;
    border: 1px solid #e8dfd5;
    border-radius: 6px;
    font-size: 13px;
    color: #2c1810;
    background-color: #faf8f5;
    outline: none;
    cursor: pointer;
}

select:focus {
    border-color: #c59b27;
}
</style>