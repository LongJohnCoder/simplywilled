import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { YourPetGuardiansComponent } from './your-pet-guardians.component';

describe('YourPetGuardiansComponent', () => {
  let component: YourPetGuardiansComponent;
  let fixture: ComponentFixture<YourPetGuardiansComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ YourPetGuardiansComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(YourPetGuardiansComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
