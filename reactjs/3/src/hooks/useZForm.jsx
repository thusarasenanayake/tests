import { useRef, useState, useEffect } from "react";

const useZForm = (initialData, validationRules, config = {}) => {
  const [formData, setFormData] = useState(initialData);
  const [formErrors, setFormErrors] = useState({});
  const { validateOnMount = false } = config;
  const formRef = useRef({ data: formData, errors: formErrors });

  const validateForm = (data) => {
    const errors = {};

    for (const fieldName in validationRules) {
      const fieldRules = validationRules[fieldName];
      for (const rule of fieldRules) {
        if (!rule.validator(data[fieldName])) {
          errors[fieldName] = rule.message;
          break;
        }
      }
    }

    setFormErrors(errors);
    formRef.current.errors = errors;
    return Object.keys(errors).length === 0;
  };

  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData((prevData) => ({ ...prevData, [name]: value }));
    formRef.current.data = { ...formRef.current.data, [name]: value };
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    if (validateForm(formData)) {
      // Perform form submission logic
      console.log("Form data:", formData);
    }
  };

  useEffect(() => {
    if (validateOnMount) {
      validateForm(formData);
    }
  }, []); // eslint-disable-line react-hooks/exhaustive-deps

  formRef.current.data = formData;
  formRef.current.errors = formErrors;
  formRef.current.handleSubmit = handleSubmit;

  return formRef.current;
};

export default useZForm;
