import React, { useEffect, useState } from "react";
import Select from "react-select";
import ReactDOM from "react-dom";
import Api from "../../utils/api";

function simpleArraySum(ar) {
    var sum = 0;
    for (var i = 0; i < ar.length; i++) {
        sum += parseInt(ar[i]);
    }
    return sum;
}

function TransactionForm(props) {
    const api = new Api();
    const [loadingData, setLoadingData] = useState(true);
    const [data, setData] = useState([]);
    const [selectQty, setSelectQty] = useState([]);
    const [part, setPart] = useState([]);
    const [qty, setQty] = useState([]);
    const [error, setError] = useState([]);
    const [totalQty, setTotalQty] = useState([]);

    useEffect(() => {
        async function getData() {
            api.getRequestFormByGRF(props.grfcode).then((response) => {
                var selectQtyRaw = [];
                var parts = [];
                var qty_raw = [];
                var error_raw = [];
                var totalQty_raw = [];
                for (let i = 0; i < response.data.data.length; i++) {
                    selectQtyRaw[i] = 1;
                    parts[i] = [];
                    qty_raw[i] = [];
                    error_raw[i] = false;
                    totalQty_raw[i] = 0;
                }
                setPart(parts);
                setQty(qty_raw);
                setError(error_raw);
                setTotalQty(totalQty_raw);
                setSelectQty(selectQtyRaw);
                setData(response.data.data);
                setLoadingData(false);
            });
        }
        if (loadingData) {
            getData();
        }
    }, []);

    const addSelect = (index) => {
        let newSelectQty = [...selectQty];
        newSelectQty[index] = selectQty[index] + 1;
        setSelectQty(newSelectQty);
    };

    const changePart = (event, index, i) => {
        var parts = part.slice();
        parts[index][i] = event.value;
        setPart(parts);
    };
    const changeQuantity = (event, index, i, max) => {
        var qty_raw = qty.slice();
        var error_raw = error.slice();
        var total_raw = totalQty.slice();
        qty_raw[index][i] = parseInt(event.target.value);
        setQty(qty_raw);
        var total = simpleArraySum(qty[index]);
        total_raw[index] = isNaN(total) ? 0 : total;
        // console.log(total_raw);

        setTotalQty(total_raw);

        if (simpleArraySum(qty[index]) > parseInt(max)) {
            error_raw[index] = true;
            setError(error_raw);
        } else {
            error_raw[index] = false;
            setError(error_raw);
        }
    };

    const handleClickSubmit = (event) => {
        event.preventDefault();
        event.preventDefault();
        const margeParts = [];
        const margeQty = [];

        for (let i = 0; i < part.length; i++) {
            margeParts.push(...part[i]);
            margeQty.push(...qty[i]);
        }

        api.postTransactionApprovedIC(props.grf_id, margeParts, margeQty).then(
            (response) => {
                window.location.replace('http://localhost:8000/transaction');

            }
        );
        // const el = document.querySelector("#loading-modal");
        // const modal = tailwind.Modal.getOrCreateInstance(el);
        // modal.show();
    };
    const handleSubmit = (event) => {
        event.preventDefault();
        console.log("Pkeee");

        
    };

    return (
        <>
            <div class="intro-y box p-5">
                <form onSubmit={handleClickSubmit}>
                    <div class="overflow-x-auto">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="col-3">SEGMENT</th>
                                    <th class="col-3">PART </th>
                                    <th class="col-2">TOTAL ITEM</th>
                                    <th class="col-10">QUANTITY </th>
                                </tr>
                            </thead>
                            <tbody>
                                {data.map((item, index) => {
                                    return (
                                        <tr key={index}>
                                            <td>{index + 1}</td>
                                            <td>
                                                {item.segment.name}{" "}
                                                {item.select_qty}
                                            </td>
                                            <td>
                                                {[
                                                    ...Array(selectQty[index]),
                                                ].map((x, i) => (
                                                    <Select
                                                        onChange={(e) =>
                                                            changePart(
                                                                e,
                                                                index,
                                                                i
                                                            )
                                                        }
                                                        name="part_id[]"
                                                        className="part_id"
                                                        options={item.segment.parts.map(
                                                            (d) => ({
                                                                value: d.id,
                                                                label: d.name,
                                                            })
                                                        )}
                                                        key={i}
                                                    />
                                                ))}

                                                <button
                                                    type="button"
                                                    onClick={() =>
                                                        addSelect(index)
                                                    }
                                                >
                                                    Tambah +
                                                </button>
                                            </td>
                                            <td>{item.quantity}</td>

                                            <td>
                                                {[
                                                    ...Array(selectQty[index]),
                                                ].map((x, i) => (
                                                    <input
                                                        onChange={(e) =>
                                                            changeQuantity(
                                                                e,
                                                                index,
                                                                i,
                                                                item.quantity
                                                            )
                                                        }
                                                        name="quantity"
                                                        id="crud-form-1"
                                                        type="number"
                                                        class="form-control w-full quantity_part"
                                                        placeholder="Input text"
                                                    />
                                                ))}

                                                <p>Total : {totalQty[index]}</p>
                                                {error[index] ? (
                                                    <p className="text-danger">
                                                        Data tidak boleh lebih
                                                        dari {item.quantity}
                                                    </p>
                                                ) : (
                                                    ""
                                                )}
                                            </td>
                                        </tr>
                                    );
                                })}
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right mt-5">
                        <button
                            type="button"
                            onClick={() => console.log("OKEY")}
                            class="btn btn-outline-secondary w-24 mr-1"
                        >
                            Cancel
                        </button>
                        {/* <button >alert</button> */}

                        <button type="submit" class="btn btn-primary w-24">
                            Save
                        </button>
                                    
                    </div>
                </form>
            </div>

            {/* <div
                id="loading-modal"
                class="modal"
                // tabindex="-1"
                // aria-hidden="true"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="p-5 text-center">
                                <i
                                    data-lucide="x-circle"
                                    class="w-16 h-16 text-danger mx-auto mt-3"
                                ></i>
                                <div class="text-3xl mt-5">
                                    Apakah anda yakin?
                                </div>
                                <div class="text-slate-500 mt-2">
                                    Proses ini tidak dapat di ulang
                                </div>
                            </div>
                            <div class="px-5 pb-8 text-center">
                                <button
                                    type="button"

                                    // data-tw-dismiss="modal"
                                    class="btn btn-outline-secondary mr-1"
                                >
                                    Cancel
                                </button>
                                <button
                                    type="button"
                                    onClick={() => console.log("OKEY")}
                                    class="btn btn-primary"
                                >
                                    Ya, Saya yakin
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> */}
        </>
    );
}

if (document.getElementById("transaction-ic-form")) {
    const propsContainer = document.getElementById("transaction-ic-form");
    const props = Object.assign({}, propsContainer.dataset);
    ReactDOM.render(
        <TransactionForm {...props} />,
        document.getElementById("transaction-ic-form")
    );
}
