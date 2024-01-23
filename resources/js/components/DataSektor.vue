<template>
    <div>

      <div v-for="(field, index) in fields" :key="index" class="grid md:grid-cols-3 md:gap-4">
        <div class="relative z-999 w-full mb-6 group">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Sektor</label>
          <select
            v-model="field.sektor_id"
            id="sektor_id"
            required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          >
            <option v-for="option in sektorOptions" :key="option.value" :value="option.value" :disabled="isOptionDisabled(option.value, index)">
              {{ option.label }}
            </option>
          </select>
        </div>
        <div class="relative z-999 w-full mb-6 group">
          <label for="jumlah_data_sektor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Data</label>
          <input
            v-model="field.jumlah_data_sektor"
            type="number"
            id="jumlah_data_sektor"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Jumlah Data Sektor"
            required
          />
        </div>
        <div v-if="index !== 0" class="relative z-999 w-full mb-6">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Aksi</label>
          <button
            @click.prevent="removeField(field)"
            type="button"
            class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"
          >
            <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                clip-rule="evenodd"
              ></path>
            </svg>
            Delete
          </button>
        </div>
      </div>
      <button
        @click.prevent="addField"
        class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800"
      >
        <span
          class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0"
        >
          Tambah Sektor Lain
        </span>
      </button>


    </div>
  </template>
  
  <script setup>
import { ref, defineEmits, onUpdated } from "vue";
  
  const emit = defineEmits(["update:modelValue"]);
  
  const sektorOptions = [
    { value: 1, label: "Sektor Penanaman Modal" },
    { value: 2, label: "Sektor Lingkungan Hidup dan Kehutanan" },
    { value: 3, label: "Sektor Kesehatan" },
    { value: 4, label: "Sektor Perhubungan" },
    { value: 5, label: "Sektor Ketenagakerjaan" },
    { value: 6, label: "Sektor Kelautan dan Perikanan" },
    { value: 7, label: "Sektor Energi dan Sumber Daya Mineral" },
    { value: 8, label: "Sektor Perindustrian" },
    { value: 9, label: "Sektor Pariwisata" },
    { value: 10, label: "Sektor Komunikasi dan Informatika" },
    { value: 11, label: "Sektor Pertanian" },
    { value: 12, label: "Sektor Pendidikan, Kebudayaan, Riset, dan Teknologi" },
    { value: 13, label: "Sektor Sosial" },
    { value: 14, label: "Sektor Koperasi dan Usaha Kecil dan Menengah" },
    { value: 15, label: "Sektor Kesatuan Bangsa dan Politik" },
    { value: 16, label: "Sektor Pekerjaan Umum dan Perumahan Rakyat" },
    { value: 17, label: "Sektor Badan Pengawas Obat dan Makanan" },
    { value: 18, label: "Sektor Perdagangan"},
    { value: 19, label: "Sektor Agraria dan Tata Ruang Badan Pertanahan Nasional"}
  ];
  
  const fields = ref([
    {
      sektor_id: "",
      jumlah_data_sektor: "",

    },
  ]);
  
  const addField = () => {
    fields.value.push({
      sektor_id: "",
      jumlah_data_sektor: "",
      
    });
  };
  
  const removeField = (fieldToRemove) => {
    const indexToRemove = fields.value.indexOf(fieldToRemove);
    fields.value.splice(indexToRemove, 1);
  };
  
  const isOptionDisabled = (value, currentIndex) => {
    // Check if the option is already selected in previous dropdowns
    for (let i = 0; i < currentIndex; i++) {
      if (fields.value[i].sektor_id === value) {
        return true;
      }
    }
    return false;
  };



  onUpdated(() => {
    emit("update:modelValue", fields.value);
  });
  </script>
  