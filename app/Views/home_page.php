<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/styles.css">
  <title>User Profil</title>
</head>
<body>

    <div class="mx-auto flex justify-center">

      <div
        class="block my-4 max-w-[18rem] rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
        <div class="relative overflow-hidden bg-cover bg-no-repeat">
          <div class="flex justify-center my-4">
            <img
              class="rounded-t-lg"
              src="<?=$auth->picture?>"
              alt="" />
          </div>
        </div>
        <div class="p-6">
          <div
          class="block w-full max-w-[18rem] rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
          
            <ul class="text-base text-neutral-600 dark:text-neutral-200">
              <li
                class="border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
                User ID : <?=$auth->id?>
              </li>
              <li
                class="border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
                Username : <?=$auth->name?>
              </li>
              <li
                class="border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
                Family Name : <?=$auth->familyName?>
              </li>
              <li
                class="border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
                Given Name : <?=$auth->givenName?>
              </li>
              <li
                class="border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
                Email : <?=$auth->email?>
              </li>
            </ul>
          </div>

          <div class="flex flex-col">
            <div class="flex justify-end my-4">
              <a
                href="<?=base_url('logout')?>"
                class="inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                data-te-ripple-init
                data-te-ripple-color="light">
                Logout
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>

</body>
</html>