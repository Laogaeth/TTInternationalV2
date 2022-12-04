const validation = new JustValidate("#signup");

validation
.addField("#name", [
  {
    rule: "required"
  },
])

.addField("#email",
[
    {
        rule:"required"
    },
    {
        rule: "email"
    }
])

.addField("#password", [
{
    rule: "required"
},
{
    rule: "password"
}
])
.addField("#password_confirmation",[
    {
        validator: (value, fields) =>{
            return value === fields ["#password"].elem.value;
        },
        errorMessage: "Passwords must match."
    }
])
.onSucess((event)=>{
    document.getElementById("signup").submit();  //only after all validations are completed it will submit
});