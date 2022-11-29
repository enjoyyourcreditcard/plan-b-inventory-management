
export default class Filter {

    search = (search, column, rawData) => {

        if (column === "brand" || column === "brand_name") {
            if (search === "All") {
                return rawData;
            } else {
                let data = column === "brand_name" ? rawData.filter((item) => item.brand_name === search) : rawData.filter((item) => item.brand.name === search)
                return data;
            }
        }if (column === "part" || column === "part_name") {
            if (search === "All") {
                return rawData;
            } else {
                let data = column === "part_name" ? rawData.filter((item) => item.name.toLowerCase().includes(search.toLowerCase())) : rawData.filter((item) => item.name.toLowerCase().includes(search.toLowerCase()))
                return data;
            }
        } else if (column === "category" || column === "category_name") {
            if (search === "All") {
                return rawData;
            } else {
                let data = column === "category_name" ? rawData.filter(item => item.category_name.indexOf(search) > -1) : rawData.filter(item => item.category.name.indexOf(search) > -1);
                return data;
            }
        } else if (column === "sn_status") {
            if (search === "All") {
                return rawData;
            } else {
                let data = rawData.filter((i) => i.sn_status === search)
                return data;
            }

        } else if (column === "stocks_count") {
            let data = rawData.filter((item) => item.stocks_count === parseInt(search))
            return data;
        } else if (column === "total_part") {

            if (search === null || search === "" || search === " ") {
                return rawData;
            } else {
                let data = rawData.filter((item) => (item.parts.length).indexOf(parseInt(search)) > -1)
                return data;
            }

        } else if (column === "sn_code") {

            if (search === null || search === "" || search === " ") {
                return rawData;
            } else {
                let data = rawData.filter((item) => item.sn_code !== null ? item.sn_code.indexOf(parseInt(search)) > -1 : null)
                return data;

            }

        } else {
            let data = rawData.filter(item => eval("item." + column).toLowerCase().indexOf(search) > -1);
            return data;
        }
    };

    noStock = (noStock, rawData) => {
        return noStock ? rawData : rawData.filter((i) => i.stocks_count === 0)
    }




}
