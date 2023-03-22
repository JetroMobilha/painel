<template>
  <vs-row>   
    <vs-col vs-lg="12" >
      <vs-card >
        <vue-cal
          :style="{ height:'375px'}"
          locale="pt-br"
          active-view="month"
          class="vuecal--blue-theme"
          :events="events"
        >
        </vue-cal>
        <div slot="footer">
         
        <vs-row vs-justify="flex-end">
          <vs-button color="success" icon="add" 
          :to="{
                name:'CrudGeneratedAdd',
                params:{
                  slug: table,
                },
              }"></vs-button>
          <vs-button color="primary" icon="aspect_ratio" @click="popupActivoExpande=true"></vs-button>
          <vs-popup fullscreen title="Calendário" :active.sync="popupActivoExpande" :style="{ MarginTop:'150px'}">
            <vs-row>   
              <vs-col vs-lg="2" >
                <vue-cal
                  xsmall
                  :time="false"
                  hide-view-selector
                  active-view="month"
                  locale="pt-br"
                  :disable-views="['years', 'week', 'day']"
                  @cell-focus="selectedDate = $event"
                  class="vuecal--blue-theme vuecal--rounded-theme"
                  style="max-height: 400px"
                  :events="events">
                </vue-cal>
              </vs-col>

              <vs-col vs-lg="10" >
                <vue-cal
                  hide-view-selector
                  active-view="week"
                  locale="pt-br"
                  :disable-views="['years', 'year', 'month']"
                  :selected-date="selectedDate"
                  class="vuecal--blue-theme"
                  :events="events">
                </vue-cal>
              </vs-col>

            </vs-row>
          </vs-popup>
        </vs-row>
      </div>
      </vs-card>
    </vs-col>
  </vs-row>
</template>

<script>
import * as _ from "lodash";
import downloadExcel from "vue-json-excel";
import jsPDF from "jspdf";
import "jspdf-autotable";
export default {
  components: { downloadExcel },
  name: "BadasoCalendario",
  props: {
    nome:'',
    label:'',
    icon:'',
    type:'',
    table:'',
  },
  data: () => ({
    errors: {},
    data: {},
    popupActivoAdicione:false,
    popupActivoExpande:false,
    selectedDate: null,
    events:[],
  }),
  watch: {
    
  },
  mounted() {
    this.getEntity();
  },
  methods: {
    async getEntity() {
      this.$openLoader();
      try {
        const response = await this.$api.badasoDashboard.table({
          nome: this.nome,
        });
        const {
          data: { dataType },
        } = await this.$api.badasoTable.getDataType({
          slug: this.nome,
        });
        this.$closeLoader();
        this.data = response.data;
        this.events = response.data.data;
        this.totalItem =
          response.data.total > 0
            ? Math.ceil(response.data.total / this.limit)
            : 1;
        this.dataType = dataType;
        const dataRows = this.dataType.dataRows.map((data) => {
          try {
            data.details = JSON.parse(data.details);
          } catch (error) {}
          return data;
        });
        this.dataType.dataRows = JSON.parse(JSON.stringify(dataRows));
        const addFields = dataRows.filter((row) => row.add);
        const editFields = dataRows.filter((row) => row.edit);
        const readFields = dataRows.filter((row) => row.read);
        this.isCanAdd = addFields.length > 0;
        this.isCanEdit = editFields.length > 0;
        this.isCanRead = readFields.length > 0;
        if (this.dataType.orderColumn && this.dataType.orderDisplayColumn) {
          this.isCanSort = true;
        }
        this.prepareExcelExporter();
      } catch (error) {
        if (error.status == 503) {
          this.showMaintenancePage = true;
        }
        this.$closeLoader();
        this.$vs.notify({
          title: this.$t("alert.danger"),
          text: error.message,
          color: "danger",
        });
      }
    }, 
  },
  computed: {
    isOnline: {
      get() {
        const isOnline = this.$store.getters["badaso/getGlobalState"].isOnline;
        return isOnline;
      },
    },
  },
};
</script>
 
