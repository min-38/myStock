class StockBase extends Component {
    constructor() {
        super();
        this.stockChart = "";
        this.stockCode = "^KS11";
        this.stockName = "KOSPI";
        this.stockName_KR = "코스피";

        this.loadDate = "";

        this.json = {};
        this.stockData = anychart.data.table(0);
    }

    setCandleChart(selector) {
        this.stockChart = anychart.stock();

        // map loaded data for the ohlc series
        var mapping = this.stockData.mapAs({
            open: 1,
            high: 2,
            low: 3,
            close: 4
        });

        const scrollerMapping = this.stockData.mapAs({'value': 5});

        this.stockChart.data = this.stockData;

        // create first plot on the chart
        const plot = this.stockChart.plot(0);
        // set grid settings
        plot.yGrid(true).xGrid(true).yMinorGrid(true).xMinorGrid(true);

        // create EMA indicators with period 50
        plot
            .ema(this.stockData.mapAs({ value: 4 }))
            .series()
            .stroke('1.5 #FF6600');

        var series = plot.candlestick(mapping);
        series.name(this.setChartTitle());
        series.legendItem().iconType('rising-falling');

        // create scroller series with mapped data
        this.stockChart.scroller().candlestick(mapping);

        // set chart selected date/time range
        // this.stockChart.selectRange('2022-01-01', '2023-05-20');

        // set container id for the chart
        this.stockChart.container(selector);
        // initiate chart drawing
        this.stockChart.draw();

        // create range picker
        var rangePicker = anychart.ui.rangePicker();
        // // init range picker
        rangePicker.render(this.stockChart);

        // // create range selector
        var rangeSelector = anychart.ui.rangeSelector();
        // // init range selector
        rangeSelector.render(this.stockChart);
    }

    setChartData(flag) {
        if(flag) {
            this.stockData.remove();
        }
        
        const result = [];
        for (const data in this.json) {
            // const date = new Date(parseInt(data));
            const date = parseInt(data);
            result.push([
                date,
                Number(this.json[data]['Open']),
                Number(this.json[data]['High']),
                Number(this.json[data]['Low']),
                Number(this.json[data]['Close']),
                Number(this.json[data]['Volume'])
            ])

            if(!this.loadDate) {
                this.loadDate = date;
            } else {
                if(this.loadDate < date) {
                    this.loadDate = date;
                }
            }
        }
        this.stockData.addData(result);
        console.log(this.stockData);
    }

    setChartUpdate() {
        // this.stockChart.title.set("text", this.setChartTitle());
    }

    setChartTitle() {
        // const result = `${this.stockName}(${this.stockName_KR}) ${this.stockCode}`;
        const result = `${this.stockName_KR}(${this.stockName})`;
        return result;
    }

    async getData(url, formData) {
        await base.sendXhr(url, formData, true).then((response)=>{
            this.json = response;
            //	필요한 작업은 여기에
        }).catch((errorMsg)=>{
            alert(errorMsg);
        });
    }

    skipWeekend(dps) {
        return dps.x.getDay() !== 6 && dps.x.getDay() !== 0;
    }
}