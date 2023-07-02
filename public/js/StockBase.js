class StockBase extends Base {
    constructor() {
        super();
        this.stock = "KOSPI";
    }

    // 주식 검색
    async getStockData(stock = "") {
        if(stock && this.stock !== stock)
            this.stock = stock;

        const formData = new FormData();
        formData.append('name', this.stock);
        
        //Callback
        this.sendXhr("/stock", formData, true).onload = () => {
            if(this.xhr.readyState === this.xhr.DONE){  
                if (this.xhr.status == 200) {
                    if(this.xhr.response) {
                        this.drawChart(this.xhr.response);
                    }
                } else if (this.xhr.status == 422) {
                    setErrorMsg(this.xhr.response);
                } else {
                    //failed
                    alert("알 수 없는 오류가 발생했습니다.\n다시 한번 시도해주세요.");
                }

                this.getStockData(this.stock);
            }
        }
    }

    drawChart(object) {
        if(Object.keys(object).length <= 0) {
            return;
        }
        const dps1 = [], dps2= [];

        for (const data in object) {
            dps1.push({x: new Date(parseInt(data)), y: [Number(object[data]['Open']), Number(object[data]['High']), Number(object[data]['Low']), Number(object[data]['Close'])]});
            dps2.push({x: new Date(parseInt(data)), y: Number(object[data]['Close'])});
        }
        
        const instance = this;
        let stockChart = new CanvasJS.StockChart("chartContainer", {
            theme: "light2",
            title:{
                text:instance.stock,
            },
            subtitles: [{
                // text: "Exponential Moving Average"
            }],
            charts: [{
                axisY: {
                    prefix: "$"
                },
                toolTip: {
                shared: true
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "top",
                    itemclick: function (e) {
                        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                        } else {
                        e.dataSeries.visible = true;
                        }
                        e.chart.render();
                    }
                },
                data: [{
                    type: "candlestick",
                    name: "Stock Price",
                    showInLegend: true,
                    yValueFormatString: "$#,###.##",
                    xValueType: "dateTime",
                    dataPoints : dps1
                }],
            }],
            navigator: {
                data: [{
                    dataPoints: dps2
                }],
            }
        });

        stockChart.render();
        var ema = this.calculateEMA(dps1, 7);
        stockChart.charts[0].addTo("data", {type: "line", name: "EMA", showInLegend: true, yValueFormatString: "$#,###.##", dataPoints: ema});
    }

    calculateEMA(dps, count) {
        var k = 2 /(count + 1);
        var emaDps = [{x: dps[0].x, y: dps[0].y.length ? dps[0].y[3] : dps[0].y}];
        for (var i = 1; i < dps.length; i++) {
            emaDps.push({x: dps[i].x, y: (dps[i].y.length ? dps[i].y[3] : dps[i].y) * k + emaDps[i - 1].y * (1 - k)});
        }
        return emaDps;
    }
}

const stockBase = new StockBase();
stockBase.getStockData();