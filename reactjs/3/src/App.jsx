import { useRef } from "react";
import { useState } from "react";
import useHighlighter from "./hooks/useHighlighter";
import useZForm from "./hooks/useZForm";

function App() {
  const formRef = useRef(null);
  // const validationRules = {
  //   input1: [
  //     {
  //       validator: (value) => value !== "",
  //       message: "Input 1 is required",
  //     },
  //   ],
  //   input2: [
  //     {
  //       validator: (value) => value !== "",
  //       message: "Input 2 is required",
  //     },
  //   ],
  //   // Add more validation rules as needed
  // };

  // const form = useZForm({}, validationRules, { validateOnMount: false });
  useHighlighter("title");

  return (
    <div className="container p-5 mx-auto flex flex-col items-center">
      <h1 data-highlight="title" className="w-fit mx-auto p-2">
        Hello, World!
      </h1>
      <br />
      <form
        ref={formRef}
        className="flex gap-3"
        onSubmit={(e) => {
          e.preventDefault(), console.log(formRef.current.input1.value);
        }}
      >
        <input
          type="text"
          name="input1"
          className="border p-3 outline-slate-300"
          // value={form.data.input1 || ""}
          // onChange={form.handleInputChange}
        />
        {/* {form.errors.input1 && <span>{form.errors.input1}</span>} */}
        <input
          type="text"
          name="input2"
          className="border p-3 outline-slate-300"
          // value={form.data.input2 || ""}
          // onChange={form.handleInputChange}
        />
        {/* {form.errors.input2 && <span>{form.errors.input2}</span>} */}
        {/* Add more input fields and error display as needed */}
        <button
          className="uppercase bg-neutral-600 px-3 rounded-md text-white"
          type="submit"
        >
          Submit
        </button>
      </form>
    </div>
  );
}

export default App;
