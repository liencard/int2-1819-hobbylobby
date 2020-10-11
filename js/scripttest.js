{
  const handleChangeFilter = e => {
    const type = e.currentTarget.value;
    console.log(type);
    const path = window.location.href.split(`?`)[0];
    const qs = `?page=activiteiten&type=${type}`;
    getActivities(`${path}${qs}`);
  }

  const getActivities = async url => {
    const response = await fetch(url, {
      headers: new Headers({
        Accept: 'application/json'
      })
    });
    const activities = await response.json();
    window.history.pushState({}, ``, url);
    showActivities(activities);
    console.log(activities);
  };

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

    const $activity = document.querySelector(`.filter-type`);
    if ($activity) {
      $activity.addEventListener(`change`, handleChangeFilter);
    }
  };

  init();
}
