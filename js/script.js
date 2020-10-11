{
  const handleChangeFilter = e => {
    submitWithJS();
  }

  const submitWithJS = async () => {
    const $form = document.querySelector('.filter-activities'); // zorgen dat juist class wordt geselecteerd
    const data = new FormData($form);
    const entries = [...data.entries()];
    const qs = new URLSearchParams(entries).toString();
    const url = `${$form.getAttribute('action')}?${qs}`;

    const response = await fetch(url, {
      headers: new Headers({
        Accept: 'application/json'
      })
    });
    const activities = await response.json();

    showActivities(activities);

    window.history.pushState(
      {},
      '',
      `${window.location.href.split('?')[0]}?${qs}`
    );
  }

  const showActivities = activities => {
    const $list = document.querySelector('.agenda');
    $list.innerHTML = ``;
    activities.forEach(activity => {
      $list.innerHTML += `
        <article class="activity">
          <div class="labels">
              <span class="label__type">${activity.type}</span>
              <span class="label__date">${activity.start}</span>
          </div>
          <div class="activity__wrapper">
              <img class="activity__img" src="${activity.image}" alt="Kruidenmarkt collage beeld" height="205">
              <h3 class="activity__title">${activity.title}</h3>
          </div>
          <a class="btn btn--full" href="index.php?page=detail&id=${activity.id}">Meer info</a>
        </article>`;
    });
  };

  const init = () => {
    document.documentElement.classList.add('has-js');
    document.querySelectorAll('.filter-select').forEach($select => $select.addEventListener('change', handleChangeFilter));
  };

  init();
}
