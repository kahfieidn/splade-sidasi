<template>
    <div>

        

    </div>
</template>

<script setup>
import { ref, defineEmits, onUpdated } from "vue";

const emit = defineEmits(["update:modelValue"]);

const fields = ref([
    {
        nama_perusahaan: "",
        alamat_perusahaan: "",
        tanggal_masuk: "",
        tanggal_izin: "",
        nomor_izin: "",
        izin_id: "",
    },
]);

const addField = () => {
    fields.value.push({
        nama_perusahaan: "",
        alamat_perusahaan: "",
        tanggal_masuk: "",
        tanggal_izin: "",
        nomor_izin: "",
        izin_id: "",
    });
};

const removeField = (fieldToRemove) => {
    const indexToRemove = fields.value.indexOf(fieldToRemove);
    fields.value.splice(indexToRemove, 1);
};

onUpdated(() => {
    emit("update:modelValue", fields.value);
});
</script>