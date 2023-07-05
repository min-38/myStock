class StockChart extends StockBase {
    constructor() {
        super();
        this.stockList = [];

        this.isRender = false;
        // this.view = "";
        this.scv = new StockChartView();
        this.stockChange = false;
    }

    // 주식 리스트 가져오기
    async getStockList() {
        //
    }

    // 주식 데이터 가져오기
    async getStockData() {
        const formData = new FormData();
        formData.append('name', this.stockCode);
        formData.append('startDate', this.loadDate);

        // TODO: 더 나은 방법이 없을까 생각해볼 필요 있음
        await this.getData("/stock/getChartData", formData);
        await this.drawChart(this.stockChange);
    }

    setEvent() {
        const instance = this;
        window.onload = function(e) {
            document.getElementById("autoComplete").addEventListener("keyup", function (event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    instance.searchStock(this.value);
                }
            });
        }
    }
    
    drawChart(isUpdate = false) {
        this.setChartData(isUpdate);

        if(isUpdate) {
            this.setChartUpdate();
            this.stockChange = false;
        } else {
            this.setCandleChart("chartContainer");
        }
    }

    // 초기 로드
    load() {
        this.renderChart();
    }

    renderChart() {
        this.getStockData();
        const autoComplete = new AutoComplete("#autoComplete");
        autoComplete.setAutoComplete();
    }

    searchStock(input) {
        if(this.stockCode === input) {
            return;
        }

        this.stockCode = input;
        this.loadDate = "1900-01-01";
        this.stockChange = true;
        this.getStockData();
    }


}

const stockChart = new StockChart();
stockChart.load();
stockChart.setEvent();